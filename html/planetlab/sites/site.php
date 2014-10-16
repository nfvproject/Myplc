<?php

  // $Id$

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

// -------------------- 
// recognized URL arguments
$site_id=intval($_GET['id']);
if ( ! $site_id ) { plc_error('Malformed URL - id not set'); return; }

////////////////////
// Get all columns as we focus on only one entry
$sites = $api->GetSites( array($site_id));

if (empty($sites)) {
  drupal_set_message ("Site " . $site_id . " not found");
  return;
 }

$site=$sites[0];
// var names to api return
$sitename= htmlentities($site['name']);
$abbreviated_name= htmlentities($site['abbreviated_name']);
$site_url= $site['url'];
$login_base= $site['login_base'];
$site_lat= $site['latitude'];
$site_long= $site['longitude'];
$max_slivers= $site['max_slivers'];
$max_slices= $site['max_slices'];

$enabled = $site['enabled'];
$ext_consortium_id = $site ['ext_consortium_id'];

// get peer 
$peer_id= $site['peer_id'];
$peers = new Peers ($api);
$local_peer = ! $peer_id;

// extra privileges to admins, and (pi||tech) on this site
$is_site_pi = ( $local_peer && plc_is_pi() && plc_in_site($site_id) );
$is_site_tech = ( $local_peer && plc_is_pi() && plc_in_site($site_id) );
$is_site_admin = ($local_peer && plc_is_admin());
  
$address_ids= $site['address_ids'];
$pcu_ids= $site['pcu_ids'];
$node_ids= $site['node_ids'];
$person_ids= $site['person_ids'];
$slice_ids= $site['slice_ids'];

$api->begin();
// gets address info
$api->GetAddresses( $address_ids );

// gets node info
$api->GetNodes( $node_ids, array( "node_id", "hostname", "boot_state", "pcu_ids", "ports" ) );

// gets person info
$api->GetPersons( $person_ids, array( "role_ids", "person_id", "first_name", "last_name", "email", "enabled" , "slice_ids") );

$api->GetSlices ( $slice_ids, array ("slice_id", "name", "instantiation", "node_ids", "person_ids" ) );

////////////////////
// PCU stuff - not too sure why, but GetPCUs is not exposed to the 'user' role
$display_pcus = (plc_is_admin() || plc_is_pi() || plc_is_tech());
if ($display_pcus) 
  $api->GetPCUs ($pcu_ids, array ('hostname', 'pcu_id' ));

// get results
if ($display_pcus)
  list( $addresses, $nodes, $persons, $slices, $pcus )= $api->commit();
else
  list( $addresses, $nodes, $persons, $slices )= $api->commit();
  
$techs = array();
$pis = array();
$disabled_persons = array();
if ($persons) foreach( $persons as $person ) {
  $role_ids= $person['role_ids'];

  if ( in_array( '20', $role_ids ))	$pis[] = $person;
  if ( in_array( '40', $role_ids ))	$techs[] = $person;
  if ( ! $person['enabled'] )		$disabled_persons[] = $person;
  
}

$has_disabled_persons = count ($disabled_persons) !=0;

// get number of slivers
$slivers_count=0;
if ($slices) foreach ($slices as $slice) $slivers_count += count ($slice['node_ids']);

////////////////////////////////////////
drupal_set_title("Details for site " . $sitename);
  
$tabs=array();

$tabs []= tab_mysite();

// available actions
if ( $is_site_admin)
  $tabs['Expire slices'] = array('url'=>l_actions(),
				 'method'=>'POST',
				 'values'=>array('site_id'=>$site_id,
						 'action'=>'expire-all-slices-in-site'),
				 'bubble'=>"Expire all slices and prevent creation of new slices",
				 'confirm'=>"Suspend all slices in $login_base");
/*wangyang disable the function of deleting sites
if ( $is_site_admin)
  $tabs['Delete']=array('url'=>l_actions(),
			'method'=>'POST',
			'values'=>array('site_id'=>$site_id,
					'action'=>'delete-site'),
			'bubble'=>"Delete site $sitename",
			'confirm'=>"Are you sure you want to delete site $login_base");
*/
if ( $is_site_pi ) 
  $tabs ['Add slice'] = array ('url'=>l_slice_add(),
			      'method'=>'post',
			      'bubble'=>'Create new slice in site');

if (plc_is_admin() || plc_in_site($site_id))
  $tabs["Events"]=array_merge (tablook_event(),
			       array('url'=>l_event("Site","site",$site_id),
				     'bubble'=>"Events for site $sitename"));
if (plc_is_admin() || plc_in_site($site_id))
  $tabs["Comon"]=array_merge(tablook_comon(),
			     array('url'=>l_comon("site_id",$site_id),
				   'bubble'=>"Comon page for $sitename"));


plekit_linetabs($tabs);

// show gray background on foreign objects : start a <div> with proper class
$peers->block_start ($peer_id);

// sanity checks
if ( $local_peer ) {
  // pending site
  global $PENDING_CONSORTIUM_ID;
  if ( $ext_consortium_id === $PENDING_CONSORTIUM_ID) {
    if ( ! $enabled ) 
      plc_warning ("This site is under pending registration - Please visit " . 
		   href (l_sites_pending(),"this page") . 
		   " to review pending applications.");
    else 
      plc_warning ("This site is pending but is also enabled - something is wrong. You should fix the issue with plcsh");
  } else {
    if ( ! $enabled) 
      plc_warning ("This site is disabled.");
  }
}

$can_update=(plc_is_admin ()  && $local_peer) || ( plc_in_site($site_id) && plc_is_pi());


$toggle = new PlekitToggle ('site',"Details",
			    array('visible'=>get_arg('show_details'),
				  'bubble'=>'Display and modify details for that site'));
$toggle->start();

$details = new PlekitDetails($can_update);

$f = $details->form_start(l_actions(),array('action'=>'update-site','site_id'=>$site_id));

$details->start();

if ( ! $site['is_public']) 
  $details->tr(plc_warning_html("This site is not public!"));

$details->th_td("Full name",$sitename,'name',array('width'=>50));
$details->th_td("Abbreviated name",$abbreviated_name,'abbreviated_name',array('width'=>15));
$details->th_td("URL",$site_url,'url',array('width'=>40));
$details->th_td("Latitude",$site_lat,'latitude');
$details->th_td("Longitude",$site_long,'longitude');

// modifiable by admins only
if (plc_is_admin()) 
  $details->th_td("Login base",$login_base,'login_base',array('width'=>12));
else
  $details->th_td("Login base",$login_base);
if (plc_is_admin())
  $details->th_td("Max slices",$max_slices,'max_slices');
else
  $details->th_td("Max slices",$max_slices);
if (plc_is_admin())
{
  $selectors=array(array('display'=>"False",'value'=>'0'), 
  				   array('display'=>"True",'value'=>'1'));
  $selectors[intval($enabled)]['selected'] = 'selected';

  $enable_select = $f->select_html ("enabled", $selectors);

  $details->th_td("Enabled",$enable_select,'enabled', array('input_type' => 'select', 'value'=>$enabled));
} else
  $details->th_td("Enabled",$enabled);

$details->tr_submit("submit","Update Site");

if ( ! $local_peer) {
  $details->space();
  $details->th_td("Peer",$peers->peer_link($peer_id));
 }
$details->end();
$details->form_end();
$toggle->end();

//////////////////// mode details - for local object
if ( $local_peer ) {

  //////////////////// nodes
  $nb_boot = 0;
  if ($nodes) foreach ($nodes as $node) if ($node['boot_state'] == 'boot') $nb_boot ++;

  $nodes_title = "Nodes : ";
  $nodes_title .= count($nodes) . " total";
  $nodes_title .= " / " . $nb_boot . " boot";
  if ($nb_boot < 2 ) 
    $nodes_title = plc_warning_html ($nodes_title);
  $nodes_title .= href(l_nodes_site($site_id)," (See as nodes)");

  $toggle=new PlekitToggle ('nodes',$nodes_title,
			    array('visible'=>get_arg('show_nodes')));
  $toggle->start();

  $headers=array();
  $sort_column = '0';
  if ($display_pcus) { $headers['PCU']='string'; $sort_column = '1' ; }
  $headers['hostname']='string'; 
  $headers['state']='string';

  $table = new PlekitTable ('nodes',$headers,$sort_column,array('search_area'=>false,
								'notes_area'=>false,
								'pagesize_area'=>false));
  // hash pcus on pcu_id
  if ($display_pcus) {
    global $pcu_hash;
    $pcu_hash= array();
    if ($pcus) foreach ($pcus as $pcu) $pcu_hash[$pcu['pcu_id']]=$pcu;
  }
  // search the pcu, return the string to display and mark the pcu as displayed
  //  function display_and_mark ($pcu_hash,$pcu_ids,$ports) {
  function display_and_mark ($pcu_ids,$ports) {
    global $pcu_hash;
    if (empty($pcu_ids)) return plc_warning_html('None');
    $pcu_id=$pcu_ids[0];
    if (empty($ports)) return plc_error_html('???');
    $port=$ports[0];
    $pcu=$pcu_hash[$pcu_id];
    $display= l_pcu_href($pcu_id, $pcu['hostname'] . ' : ' . $port);
    $pcu_hash[$pcu_id]['displayed']=true;
    return $display;
  }

  $table->start();
  foreach ($nodes as $node) {
    $table->row_start();
    if ($display_pcus) {
      //      $table->cell(display_and_mark($pcu_hash,$node['pcu_ids'],$node['ports']));
      $table->cell(display_and_mark($node['pcu_ids'],$node['ports']));
    }
    $table->cell (l_node_obj($node));
    $table->cell ($node['boot_state']);
    $table->row_end();
  }
  // show undisplayed PCU's if any
  if ($display_pcus) 
    if ($pcu_hash) foreach ($pcu_hash as $id=>$pcu) {
	if (!$pcu['displayed']) {
	  $table->row_start();
	  $table->cell($pcu['hostname']); $table->cell(''); $table->cell('');
	  $table->row_end();
	}
      }
    
  $table->tfoot_start();
  $table->row_start();
  $button=new PlekitFormButton (l_node_add(),"node_add","Add node","POST");
  $table->cell($button->html(),array('hfill'=>true,'align'=>'right'));
  $table->row_end();
  $table->end();
  $toggle->end();
    
  //////////////////// Users
  $persons_title = "Users : ";
  $persons_title .= count($person_ids) . " total";
  $persons_title .= " / " . count ($pis) . " PIs";
  $persons_title .= " / " . count ($techs) . " Techs";
  if ($has_disabled_persons) 
    $persons_title .= " / " . count($disabled_persons) . " Disabled";
  if ( (count ($pis) == 0) || (count ($techs) == 0) || (count($person_ids) >= 30) || count($disabled_persons) != 0 ) 
    $persons_title = plc_warning_html ($persons_title);
  $persons_title .= href(l_persons_site($site_id)," (See as users)");

  $toggle=new PlekitToggle ('persons',$persons_title,
			    array('visible'=>get_arg('show_persons')));
  $toggle->start();

  $headers = array ();
  $headers["email"]='string';
  $headers["S"]='int';
  $headers["PI"]='string';
  $headers['User']='string';
  $headers["Tech"]='string';
  if ($has_disabled_persons) $headers["Disabled"]='string';
  $notes=array('S = slices');
  $table=new PlekitTable('persons',$headers,'1r-3r-0',array('search_area'=>false,
							    'notes'=>$notes,
							    'pagesize_area'=>false));
  $table->start();
  if ($persons) foreach ($persons as $person) {
    $table->row_start();
    $table->cell(l_person_obj($person));
    $table->cell(count($person['slice_ids']));
    $table->cell( in_array ('20',$person['role_ids']) ? "yes" : "no");
    $table->cell( in_array ('30',$person['role_ids']) ? "yes" : "no");
    $table->cell( in_array ('40',$person['role_ids']) ? "yes" : "no");
    if ($has_disabled_persons) $table->cell( $person['enabled'] ? "no" : plc_warning_html("yes"));
    $table->row_end();
  }
  $table->end();
  $toggle->end();

  //////////////////// Slices
  $slices_title="Slices : ";
  $slices_title .= $max_slices . " max";
  $slices_title .= " / " . count($slice_ids) . " running";
  $slices_title .= " / $slivers_count slivers";
  if (count($slice_ids) >= $max_slices) 
    $slices_title = plc_warning_html($slices_title);
  $slices_title .= href(l_slices_site($site_id)," (See as slices)");
  
  $toggle=new PlekitToggle ('slices',$slices_title,
			    array('visible'=>get_arg('show_slices')));
  $toggle->start();

  $headers = array ();
  $headers ['name']='string';
  $headers ['I'] = 'string';
  $headers ['N']='int';
  $headers ['U']='int';
  $notes=array('I = instantiation type',
	       'N = number of nodes',
	       'U = number of users');
  $table=new PlekitTable ('slices',$headers,0,array('search_area'=>false,
						    'pagesize_area'=>false,
						    'notes'=>$notes));

  $table->start();
  if ($slices) foreach ($slices as $slice) {
      $table->row_start();
      $table->cell(l_slice_obj($slice));
      $table->cell(instantiation_label($slice));
      $table->cell (href(l_nodes_slice($slice['slice_id']),count($slice['node_ids'])));
      $table->cell (count($slice['person_ids']));
      $table->row_end();
    }
  if ($is_site_pi) {
    $button=new PlekitFormButton (l_slice_add(),"slice_add","Add slice","post");
    $table->tfoot_start();
    $table->row_start();
    $table->cell($button->html(),array('hfill'=>true,'align'=>'right'));
  }
    
  $table->end();
  $toggle->end();

  $form=new PlekitForm (l_actions(), array('site_id'=>$site_id));
  $form->start();
  //////////////////////////////////////////////////////////// Tags
  // tags section
  // already inside a if ( $local_peer )...
  
  $tags=$api->GetSiteTags (array('site_id'=>$site_id));
  function get_tagname ($tag) { return $tag['tagname'];}
  // xxx looks like tech-only see an error here, 
  // might be that GetSiteTags is not accessible or something
  $tagnames = array_map ("get_tagname",$tags);
  
  $toggle = new PlekitToggle ('tags',count_english($tags,'tag'),
			      array('bubble'=>'Inspect and set tags on that site',
				    'visible'=>get_arg('show_tags')));
  $toggle->start();

  $headers=array("Name"=>"string",
		 "Value"=>"string",
		 );
  if (plc_is_admin()) $headers[plc_delete_icon()]="none";
  
  $table_options=array("notes_area"=>false,"pagesize_area"=>false,"search_width"=>10);
  $table=new PlekitTable("site_tags",$headers,0,$table_options);
  $table->start();
  if ($tags) foreach ($tags as $tag) {
      $table->row_start();
      $table->cell(l_tag_obj($tag));
      $table->cell($tag['value']);
      // the remove checkbox
      if (plc_is_admin()) $table->cell ($form->checkbox_html('site_tag_ids[]',$tag['site_tag_id']));
      $table->row_end();
    }
  
  if ($is_site_pi || $is_site_admin) {
    $table->tfoot_start();

    // remove tag 
    $table->row_start();
    $table->cell($form->submit_html("delete-site-tags","Remove Tags"),
		 // use the whole columns and right adjust
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();

    // set tag area
    $table->row_start();
    // get list of tag names in the site/* category    
    $all_tags= $api->GetTagTypes( array ("category"=>"site*","-SORT"=>"tagname"), array("tagname","tag_type_id"));
    // xxx cannot use onchange=submit() - would need to somehow pass action name 
    function tag_selector ($tag) { return array("display"=>$tag['tagname'],"value"=>$tag['tag_type_id']); }
    $selector=array_map("tag_selector",$all_tags);
    $table->cell($form->select_html("tag_type_id",$selector,array('label'=>"Choose")));
    $table->cell($form->text_html("value","",array('width'=>8)));
    $table->cell($form->submit_html("set-tag-on-site","Set Tag"),array('columns'=>2,'align'=>'left'));
    $table->row_end();
  }
  
  $table->end();
  $toggle->end();
  $form->end();

  //////////////////// Addresses
  $toggle=new PlekitToggle ('addresses',"Addresses",
			    array('visible'=>get_arg('show_addresses')));
  $toggle->start();
  if ( ! $addresses) {
    print "<p class='addresses'>No known address for this site</p>";
  } else {
    $details=new PlekitDetails (false);
    $details->start();
    $details->th_td("Addresses","");
    foreach ($addresses as $address) {
      $details->th_td(plc_vertical_table($address['address_types']),
		       plc_vertical_table(array($address['line1'],
						$address['line2'],
						$address['line3'],
						$address['city'],
						$address['state'],
						$address['postalcode'],
						$address['country'])));
    }
    $details->end();
  }
  $toggle->end();

 }

////////////////////////////////////////
$peers->block_end($peer_id);

//plekit_linetabs ($tabs,"bottom");

// Print footer
include 'plc_footer.php';

?>
