<?php

// Require login
require_once 'plc_login.php';

// Get session and API handles
require_once 'plc_session.php';
global $plc, $api;

// Print header
require_once 'plc_drupal.php';
include 'plc_header.php';

// Common functions
require_once 'plc_functions.php';
require_once 'plc_peers.php';
require_once 'linetabs.php';
require_once 'table.php';
require_once 'details.php';
require_once 'form.php';
require_once 'toggle.php';
require_once 'plc_objects.php';

// -------------------- 
// recognized URL arguments
$node_id=intval($_GET['id']);
if ( ! $node_id ) { plc_error('Malformed URL - id not set'); return; }

////////////////////
// Need to mention columns explicitly as we want hrn which is a tag
$columns=array ('hostname','boot_state','run_level','site_id','model','node_type','version',
		'slice_ids','date_created','last_updated','last_contact','conf_file_ids','interface_ids','nodegroup_ids','peer_id',
		'pcu_ids','ports','hrn','public_ip');
	//	'pcu_ids','ports','hrn');
$nodes= $api->GetNodes( array($node_id),$columns);
//$nodes= $api->GetNodes( array($node_id));


if (empty($nodes)) {
  drupal_set_message ("Node " . $node_id . " not found");
  return;
 }

$node=$nodes[0];
// node info
$hostname= $node['hostname'];
$hrn=$node['hrn'];
$boot_state= $node['boot_state'];
$run_level = $node['run_level'];
$site_id= $node['site_id'];
$model= $node['model'];
$node_type= $node['node_type'];
$version= $node['version'];
//wangyang add,
$public_ip= $node['public_ip'];
//$public_ip= '0.0.0.0';
// arrays of ids of node info
$slice_ids= $node['slice_ids'];
$conf_file_ids= $node['conf_file_ids'];
$interface_ids= $node['interface_ids'];
$nodegroup_ids= $node['nodegroup_ids'];
//$lastupdate = $node['last_updated']
//$lastcontact = $node['last_contact']
// get peers
$peer_id = $node['peer_id'];
$peers=new Peers ($api);

// gets site info
$sites= $api->GetSites( array( $site_id ) );
$site=$sites[0];
$site_name= $site['name'];
$site_node_ids= $site['node_ids'];

// hash node_id=>hostname for this site's nodes
$site_node_hash=array();
if( !empty( $site_node_ids ) ) {
  // get site node info basics
  $site_nodes= $api->GetNodes( $site_node_ids );
    
  foreach( $site_nodes as $site_node ) {
    $site_node_hash[$site_node['node_id']]= $site_node['hostname'];
  }
 }
  
// gets slice info for each slice
if( !empty( $slice_ids ) )
  $slices= $api->GetSlices( $slice_ids, array( "slice_id", "name" , "peer_id" ) );

//get sliver info /////////////////////////////////////////for test/////////by xiaohui////////
#  $slivers= $api->GetSliverInfo(array($node_id));

// get interface info
if( !empty( $interface_ids ) )
  $interfaces= $api->GetInterfaces( $interface_ids );

// gets nodegroup info
if( !empty( $nodegroup_ids ) )
  $nodegroups= $api->GetNodeGroups( $nodegroup_ids, array("groupname","tag_type_id","value"));

// Thierry : remaining stuff
// (*) events: xxx todo xxx for admins xxx 
// should display the latest events relating to that node.
// historically we had to turn this off at some point as GetEvents was getting the session deleted in the DB
// (*) conf_files: xxx todo xxx for admins xxx
if( !empty( $conf_file_ids ) )
  $conf_files= $api->GetConfFiles( $conf_file_ids );

//////////////////// display node info

drupal_set_title("Details for node " . $hostname);
$local_peer= ! $peer_id;

  
// extra privileges to admins, and (pi||tech) on this site
$admin_privileges=(plc_is_admin () && $local_peer);
$privileges =  $admin_privileges || ( plc_in_site($site_id) && ( plc_is_pi() || plc_is_tech()));
  
$tabs=array();
// available actions
$tabs [] = tab_nodes_site($site_id);
$tabs [] = tab_site($site_id);
//$tabs [] = tab_nodes();

if ( $local_peer  && $privileges ) {
    
  $tabs["Add Interface"]=array('url'=>l_interface_add($node_id),
			       'bubble'=>"Define new network interface on $hostname");
  $tabs['Delete'] = array ('url'=>l_actions(),
			   'method'=>'POST',
			   'values'=>array('action'=>'delete-node','node_id'=>$node_id),
			   'bubble'=>"Delete node $hostname",
			   'confirm'=>'Are you sure to delete ' . $hostname);
  $tabs["Events"]=array_merge(tablook_event(),
			      array('url'=>l_event("Node","node",$node_id),
				    'bubble'=>"Events for node $hostname"));
  $tabs["Comon"]=array_merge(tablook_comon(),
			     array('url'=>l_comon("node_id",$node_id),
				   'bubble'=>"Comon page about node $hostname"));
 }

plekit_linetabs($tabs);

// show gray background on foreign objects : start a <div> with proper class
$peers->block_start ($peer_id);
  
$toggle = new PlekitToggle ('node',"Details",
			    array('bubble'=>'Display and modify details for that node',
				  'visible'=>get_arg('show_details')));
$toggle->start();

$details=new PlekitDetails($privileges);
$details->start();
if ( ! $local_peer) {
  $details->th_td("Peer",$peers->peer_link($peer_id));
  $details->space();
 }

$details->form_start(l_actions(),array("action"=>"update-node", "node_id"=>$node_id, "hostname"=>$hostname));
// xxx can hostname really be changed like this without breaking the rest, bootcd .. ?
//$details->th_td("Hostname",$hostname,"hostname"); 
$details->th_td("Hostname",$hostname); 
if ($hrn) $details->th_td("SFA hrn",$hrn);
else $details->tr("SFA hrn not set","center");
$details->th_td("Model",$model,"model");
//wangyang add,
$details->th_td("public ip",$public_ip,"public_ip");
// reservation ?
if ( $admin_privileges) {
  $reservation_value = $details->form->select_html("node_type",
						   node_type_selectors ($api, $node_type));
} else {
  $reservation_value = node_type_display ($api,$node_type);
}
$details->th_td("Reservation",$reservation_value);

$details->tr_submit("submit","Update Node");
$details->form_end();
if ($privileges) $details->space();

$display_reboot_button = FALSE;
////////////////////
// PCU stuff - not too sure why, but GetPCUs is not exposed to the 'user' role
$display_pcus = ( $local_peer && (plc_is_admin() || plc_is_pi() || plc_is_tech()));
if ($display_pcus) {
  $pcu_ids= $node['pcu_ids'];
  $ports= $node['ports'];
  // avoid 2 API calls : get all site PCUs and then search from there
  function search_pcu ($site_pcus,$pcu_id) {
    if ($site_pcus) foreach ($site_pcus as $site_pcu) if ($site_pcu['pcu_id']==$pcu_id) return $site_pcu;
    return FALSE;
  }
  $site_pcus = $api->GetPCUs(array('site_id'=>$site_id));
  // not sure what the exact semantics is, but I expect pcu_ids and ports should have same cardinality
  if (count ($pcu_ids) != count ($ports)) 
    $pcu_string = plc_error_html("Unexpected condition: " . count($pcu_ids) . " pcu_ids and " . count($ports) . " ports");
  else if (count($pcu_ids) == 0) 
    $pcu_string = plc_warning_html("No PCU !");
  else if (count($pcu_ids) == 1) {
    $pcu_id=$pcu_ids[0];
    $port=$ports[0];
    $pcu_columns = array('hostname');
    $pcu=search_pcu($site_pcus,$pcu_id);
    if ( ! $pcu ) {
      $pcu_string = plc_error_html("Cannot find PCU " . $pcu_id);
    } else {
      // else : regular case - don't set pcu_string
      // NOTE: temporarily only offer the reboot_button for DC7x00, DRAC, and HPiLO PCU models
      if ( $pcu['model'] == "IntelAMT" || $pcu['model'] == "DRAC" || $pcu['model'] == "HPiLO" ){
        $display_reboot_button = TRUE;
      }
    }
  } else 
    $pcu_string = plc_warning_html("More than one PCU attached ? ");

  // in the regular case, pcu_string is not set here
  
  $details->form_start(l_actions(),array("action"=>"attach-pcu","node_id"=>$node_id));
  // prepare selectors
  if (! $site_pcus) {
    $pcu_update_area = "This site has no PCU - " . href ( l_pcu_add(), "add one here");
  } else {
    $pcu_add_link = href (l_pcu_add(),plc_add_icon() . "Add new");

    // first option in pcus
    if ($pcu_ids) 
      $none_detach = 'Detach';
    else 
      $none_detach='None';
    $pcu_selectors = array(array('display'=>$none_detach,'value'=>-1));
    // one option per site pcu
    foreach ($site_pcus as $site_pcu) {
      $selector=array('display'=>$site_pcu['hostname'],'value'=>$site_pcu['pcu_id']);
      if ($pcu_id == $site_pcu['pcu_id']) $selector['selected']=true;
      $pcu_selectors []= $selector;
    }
    $pcu_chooser = $details->form()->select_html('pcu_id',$pcu_selectors);

    function port_selector ($i,$port) { 
      $selector = array ('display'=>'port ' . $i, 'value'=>$i); 
      if ($i == $port) $selector['selected'] = true;
      return $selector;
    }
    $port_selectors = array () ;
    $available_ports =range(1,8);
    foreach ($available_ports as $available_port) 
      $port_selectors []= port_selector ($available_port,$port);
    $port_chooser = $details->form()->select_html('port',$port_selectors);

    $pcu_attach_button = 
      $details->form()->submit_html('attach_pcu',"Attach PCU");

    $pcu_update_area = $pcu_add_link . "<br>Or, select existing  " . $pcu_chooser . " " . $port_chooser . " " . $pcu_attach_button;
  }

  if ($pcu_string) 
    $pcu_value_area=plc_vertical_table(array($pcu_string,$pcu_update_area));
  else 
    $pcu_value_area=$pcu_update_area;
    
  $details->th_td("PCU",$pcu_value_area);
  $details->form_end();
 }

//////////////////// Reboot Node
if ( $display_reboot_button ) 
{
    if ( ! empty($_SESSION['messages']) ) {
        $msg = $_SESSION['messages']['status'][0];
    } else {
        $msg = "";
    }
    $body="Hello,

This message is a template from the 'Report a problem' link on the node details page.

I've experienced a problem rebooting $hostname with the pcu_id $pcu_id; 

    http://".PLC_WWW_HOST."/db/sites/pcu.php?id=$pcu_id
    http://".PLC_WWW_HOST."/db/nodes/node.php?id=$node_id\n\n";

    if ( $msg != "" ) {
        $body .= "The last time I tried, it returned:\n    $msg\n\n";
    }
    $body .= "And, this is what I've tried, which leads me to believe that there is a bug on your side:";

    $url=rawurlencode($body);
    $email = "<font style='font-size: smaller'>><a href=\"mailto:".PLC_MAIL_SUPPORT_ADDRESS."?Subject=Reporting a problem rebooting $hostname&Body=$url\">Report a problem</a></font>";

    // NOTE: not sure how to make the buttons display side-by-side...
    $reboot = $details->form_start_html(l_actions(),array("action"=>"reboot-node-with-pcu",
                                "node_id"=>$node_id, "hostname"=>$hostname, "test"=>FALSE));
    $reboot .= $email . $details->form->submit_html("submit","Reboot Node");
    $reboot .= $details->form_end_html();

    $reboot .= $details->form_start_html(l_actions(),array("action"=>"reboot-node-with-pcu",
                                "node_id"=>$node_id, "hostname"=>$hostname, "test"=>TRUE));
    $reboot .= $details->form->submit_html("submit","Test PCU");
    $reboot .= $details->form_end_html();

    $details->tr($reboot, "right");

}
$details->space();

//////////////////// type & version
$details->th_td("CD Version",$version);
// let's use plc_objects
$Node = new Node($node);
$details->th_td("Date created",$Node->dateCreated());
$details->th_td("Last update",$Node->lastUpdated());
$details->th_td("Last contact",$Node->lastContact());

// boot area
$details->space ();
$stale_text =  $Node->stale() ? ("... (more than " . Node::stale_text() . " ago)") : "" ;
$details->th_td ("Observed Boot state", $run_level . $stale_text);
if ( ! ($local_peer && $privileges)) {
  // just display it
  $boot_value=$boot_state;
 } else {
  $boot_value="";
  $boot_form = new PlekitForm (l_actions(), array("node_id"=>$node_id,
					       "action"=>"node-boot-state"));
  $boot_value .= $boot_form->start_html();
  $states = array( 'boot'=>'Boot', 'safeboot'=>'SafeBoot', 
		   'disabled' => 'Disabled', 'reinstall'=>'Reinstall');
  $selectors=array();
  foreach ($states as $dbname=>$displayname) { 
    $selector=array("display"=>$displayname, "value"=>$dbname);
    if ($dbname == $boot_state) $selector['selected']=true;
    $selectors []= $selector;
  }
  $boot_value .= $boot_form->select_html("boot_state",$selectors,array('autosubmit'=>true));
  $boot_value .= $boot_form->end_html();
 }
$details->th_td ("Preferred Boot state",$boot_value);

// same here for the download area
if ( $local_peer  && $privileges) {

  $download_value="";
  $download_form = new PlekitForm (l_actions_download(),array("node_id"=>$node_id));
  $download_value .= $download_form->start_html();
  $selectors = array( 
		     array("display"=>"-- All in one images --","disabled"=>true),
		     array("value"=>"download-node-iso","display"=>"Download ISO image for $hostname"),
		     array("value"=>"download-node-usb","display"=>"Download USB image for $hostname"),
		     array("value"=>"download-node-usb-partition", "display"=>"Download partitioned, USB image for $hostname"),
		     //		     array("display"=>"-- Floppy + generic image --","disabled"=>true),
		     //		     array("value"=>"download-node-floppy","display"=>"Download Floppy file for $hostname"),
		     //		     array("value"=>"download-generic-iso","display"=>"Download generic ISO image (requires floppy)"),
		     //		     array("value"=>"download-generic-usb","display"=>"Download generic USB image (requires floppy)"),
		      );
  $download_value .= $download_form->select_html("action",$selectors,
						 array('label'=>"Download mode",'autosubmit'=>true));
  $download_value .= $download_form->end_html();
  $details->th_td ("Download",$download_value);

 }

// site info and all site nodes
$details->space ();
$details->th_td("Site",l_site_t($site_id,$site_name));
		   
// build list of node links
$nodes_area=array();
foreach ($site_node_hash as $hash_node_id => $hash_hostname) {
  $nodes_area []= l_node_t($hash_node_id,$hash_hostname);
}
$details->th_tds ("All site nodes",$nodes_area);

$details->end ();
$toggle->end();

$form=new PlekitForm (l_actions(), array('node_id'=>$node_id));
$form->start();

//////////////////////////////////////////////////////////// slivers
{
  $toggle=new PlekitToggle ('slices',count_english_warning($slices,'sliver'),
			    array('bubble'=>'Review slices running on that node',
				  'visible'=>get_arg('show_slices')));
  $toggle->start();
  if ( ! $slices  ) {
    plc_warning ("This node is not associated to any slice");
  } else {
    $headers=array();
    $headers['Peer']="string";
    $headers['Slice Name']="string";
    $headers['Sliver']="string";
    /////test
    $headers['Sliver State']="string"; 
    $headers['Sliver port']="string"; 
    ///////
    $reasonable_page=10;
    $table_options = array('notes_area'=>false,"search_width"=>10,'pagesize'=>$reasonable_page);
    if (count ($slices) <= $reasonable_page) {
      $table_options['search_area']=false;
      $table_options['pagesize_area']=false;
    }
    $table=new PlekitTable("node_slices",$headers,1,$table_options);
    $table->start();
    #$sliverinfos=$api->GetSliverInfo(array($node_id));
    #$sliverinfo=$sliverinfos[0];
    #$sliverstate=$sliverinfo['sliver_state'];
    foreach ($slices as $slice) {
      #$sliceid=$slice['slice_id'];
      #$sliverinfos=$api->GetSliverInfo(array($node_id));
      $sliverinfos=$api->GetSliverInfo(array("node_id"=>$node_id, "slice_id"=>$slice['slice_id']));
      $sliverinfo=$sliverinfos[0];
      $sliverstate=$sliverinfo['sliver_state'];
      $sliverport=$sliverinfo['sliver_port'];
      $table->row_start();
      $peers->cell ($table,$slice['peer_id']);
      $table->cell (l_slice_t ($slice['slice_id'],$slice['name']));
      $table->cell (l_sliver_t ($node_id,$slice['slice_id'],'sliver tags'));
      ///////
      #$table->cell ("O.K");
      
      $table->cell($sliverstate);
      $table->cell($sliverport);
      ///////
      $table->row_end();
    }
    $table->end();
  }
  $toggle->end();
}

//////////////////////////////////////////////////////////// Tags
// tags section
if ( $local_peer ) {
  
  $tags=$api->GetNodeTags (array('node_id'=>$node_id));
  function get_tagname ($tag) { return $tag['tagname'];}
  // xxx looks like tech-only see an error here, 
  // might be that GetNodeTags is not accessible or something
  $tagnames = array_map ("get_tagname",$tags);
  $nodegroups_hash=plc_nodegroup_global_hash($api,$tagnames);
  
  $toggle = new PlekitToggle ('tags',count_english($tags,'tag'),
			      array('bubble'=>'Inspect and set tags on that node',
				    'visible'=>get_arg('show_tags')));
  $toggle->start();

  $headers=array("Name"=>"string",
		 "Value"=>"string",
		 "Nodegroup"=>"string",
		 );
  if (plc_is_admin()) $headers[plc_delete_icon()]="none";
  
  $table_options=array("notes_area"=>false,"pagesize_area"=>false,"search_width"=>10);
  $table=new PlekitTable("node_tags",$headers,0,$table_options);
  $table->start();
  if ($tags) foreach ($tags as $tag) {
      // does this match a nodegroup ?
      $nodegroup_name="n/a";
      $nodegroup_key=$tag['tagname'] . "=" . $tag['value'];
      $nodegroup=$nodegroups_hash[$nodegroup_key];
      if ($nodegroup) $nodegroup_name=l_nodegroup_t($nodegroup['nodegroup_id'],$nodegroup['groupname']);
      $table->row_start();
      $table->cell(l_tag_obj($tag));
      $table->cell($tag['value']);
      $table->cell($nodegroup_name);
      // the remove checkbox
      if (plc_is_admin()) $table->cell ($form->checkbox_html('node_tag_ids[]',$tag['node_tag_id']));
      $table->row_end();
    }
  
  if ($privileges) {
    $table->tfoot_start();

    // remove tag 
    $table->row_start();
    $table->cell($form->submit_html("delete-node-tags","Remove Tags"),
		 // use the whole columns and right adjust
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();

    // set tag area
    $table->row_start();
    // get list of tag names in the node/* category    
    $all_tags= $api->GetTagTypes( array ("category"=>"node*","-SORT"=>"tagname"), array("tagname","tag_type_id"));
    // xxx cannot use onchange=submit() - would need to somehow pass action name 
    function tag_selector ($tag) { return array("display"=>$tag['tagname'],"value"=>$tag['tag_type_id']); }
    $selector=array_map("tag_selector",$all_tags);
    $table->cell($form->select_html("tag_type_id",$selector,array('label'=>"Choose")));
    $table->cell($form->text_html("value","",array('width'=>8)));
    $table->cell($form->submit_html("set-tag-on-node","Set Tag"),array('columns'=>2,'align'=>'left'));
    $table->row_end();
  }
  
  $table->end();
  $toggle->end();
}

//////////////////////////////////////////////////////////// interfaces
if ( $local_peer ) {
  $toggle=new PlekitToggle ('interfaces',count_english_warning($interfaces,'interface'),
			    array('bubble'=>'Inspect and tune interfaces on that node',
				  'visible'=>get_arg('show_interfaces')));
  $toggle->start();
  // display interfaces
  if( ! $interfaces ) {
    echo '<p>';
    plc_warning_html("This node has no interface");
    echo "Please add an interface to make this a usable PLC node.</p>\n";
  } // else { // show this unconditionnally as otherwise there's no mean to create one..

    // display a hostname column iff at least one interface has a hostname
    $need_hostname=false;
    if ($interfaces) foreach ($interfaces as $interface) if ($interface['hostname']) $need_hostname=true;

    $headers=array();

    $sort_column=0;
    if (plc_is_admin()) { $headers['I']='int'; $sort_column +=1;}
    $headers["IP"]="sortIPAddress";
    if ($need_hostname) $headers['hostname']='string';
    $headers["Method"]="string";
    $headers["Type"]="string";
    $headers["MAC"]="string";
    $headers["bw limit"]="sortBandwidth";
    $headers["tags"]=array('type'=>'int',
			   'title'=>"number of tags set on interface");
    // a single symbol, marking 'p' for primary and a delete button for non-primary
    if ( $privileges ) $headers[plc_delete_icon()]='string';

    $table_options=array('search_area'=>false,"pagesize_area"=>false,'notes_area'=>false);
    $table=new PlekitTable("node_interfaces",$headers,$sort_column,$table_options);
    $table->start();
	
    if ($interfaces) foreach ( $interfaces as $interface ) {
      $interface_id= $interface['interface_id'];
      $interface_ip= $interface['ip'];

      $table->row_start();
      if (plc_is_admin()) $table->cell(l_interface_t($interface_id,$interface_id));
      $table->cell(l_interface_t($interface_id,$interface_ip));
      if ($need_hostname) $table->cell($interface['hostname']);
      $table->cell($interface['method']);
      $table->cell($interface['type']);
      $table->cell($interface['mac']);
      $table->cell(pretty_bandwidth($interface['bwlimit']));
      $table->cell(href(l_interface_tags($interface_id),
			count($interface['interface_tag_ids'])));
      if ( $privileges ) {
	if ($interface['is_primary']) {
	  $table->cell(plc_bubble("p","Cannot delete a primary interface"));
	} else {
	  $table->cell ($form->checkbox_html('interface_ids[]',$interface_id));
	}
      }
      $table->row_end();
    }
    if ($privileges) {
      $table->tfoot_start();
      $table->row_start();
      // we should have 6 cols, use 3 for the left (new) and the rest for the right (remove)
      //$add_button=new PlekitFormButton (l_interface_add($node_id),"add","Add Interface","GET");
      //$table->cell($add_button->html(),array('columns'=> 3,'align'=>'left'));
      $table->cell($form->submit_html("new-interface","Add Interface"), 
      		array('columns'=> 3,'align'=>'left'));
      $table->cell($form->submit_html("delete-interfaces","Remove Interfaces"), 
		   array('columns'=>$table->columns()-3,'align'=>'right'));
      $table->row_end();
    }
    $table->end();
    //  }
  $toggle->end();
 }

$form->end();

////////////////////////////////////////////////////////////
$peers->block_end($peer_id);

//plekit_linetabs ($tabs,"bottom");

// Print footer
include 'plc_footer.php';

?>
