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
require_once 'plc_objects.php';
require_once 'plc_visibletags2.php';
require_once 'linetabs.php';
require_once 'table2.php';
require_once 'details.php';
require_once 'toggle.php';
require_once 'form.php';
require_once 'raphael.php';
require_once 'columns.php';

// keep css separate for now
drupal_set_html_head('
<link href="/planetlab/css/my_slice.css" rel="stylesheet" type="text/css" />
');

// -------------------- admins potentially need to get full list of users
//error_reporting(0);

$profiling=false;
if ($_GET['profiling']) $profiling=true;

if ($profiling)  plc_debug_prof_start();

// -------------------- 
// recognized URL arguments
$slice_id=intval($_GET['id']);
if ( ! $slice_id ) { plc_error('Malformed URL - id not set'); return; }

////////////////////
// have to name columns b/c we need the non-native 'omf_control' column
$slice_columns=array('slice_id','name','peer_id','site_id','person_ids','node_ids','expires',
		     'url','description','instantiation','omf_control');
$slices= $api->GetSlices( array($slice_id), $slice_columns);

if (empty($slices)) {
  drupal_set_message ("Slice " . $slice_id . " not found");
  return;
 }

$slice=$slices[0];

if ($profiling) plc_debug_prof('01: slice',count($slices));
// pull all node info to vars
$name= $slice['name'];
$expires = date( "d/m/Y", $slice['expires'] );
$site_id= $slice['site_id'];

$person_ids=$slice['person_ids'];

// get peers
$peer_id= $slice['peer_id'];
$peers=new Peers ($api);
$local_peer = ! $peer_id;

if ($profiling) plc_debug_prof('02: peers',count($peers));

// gets site info
$sites= $api->GetSites( array( $site_id ) );
$site=$sites[0];
$site_name= $site['name'];
$max_slices = $site['max_slices'];

if ($profiling) plc_debug_prof('03: sites',count($sites));
//////////////////////////////////////// building blocks for the renew area
// Constants
global $DAY;		$DAY = 24*60*60;
global $WEEK;		$WEEK = 7 * $DAY; 
global $MAX_WEEKS;	$MAX_WEEKS= 8;		// weeks from today
global $GRACE_DAYS;	$GRACE_DAYS=10;		// days for renewal promoted on top
global $NOW;		$NOW=mktime();

//////////////////////////////////////////////////////////// utility for the renew tab
// make the renew area on top and open if the expiration time is less than 10 days from now
function renew_needed ($slice) {
  global $DAY, $NOW, $GRACE_DAYS;
  $current_exp=$slice['expires'];

  $time_left = $current_exp - $NOW;
  $visible = $time_left/$DAY <= $GRACE_DAYS;
  return $visible;
}

function renew_area ($slice,$site,$visible) {
  global $DAY, $WEEK, $MAX_WEEKS, $GRACE_DAYS, $NOW;
 
  $current_exp=$slice['expires'];
  $current_text = gmstrftime("%A %b-%d-%y %T %Z", $current_exp);
  $max_exp= $NOW + ($MAX_WEEKS * $WEEK); // seconds since epoch
  $max_text = gmstrftime("%A %b-%d-%y %T %Z", $max_exp);

  // xxx some extra code needed to enable this area only if the slice description is OK:
  // description and url must be non void
  $toggle=
    new PlekitToggle('renew',"Expires $current_text - Renew this slice",
		     array("bubble"=>
			   "Enter this zone if you wish to renew your slice",
			   'visible'=>$visible));
  $toggle->start();

  // xxx message could take roles into account
  if ($site['max_slices']<=0) {
     $message= <<< EOF
<p class='my-slice-renewal'>Slice creation and renewal have been temporarily disabled for your
<site. This may have occurred because your site's nodes have been down
or unreachable for several weeks, and multiple attempts to contact
your site's PI(s) and Technical Contact(s) have all failed. If so,
contact your site's PI(s) and Technical Contact(s) and ask them to
bring up your site's nodes. Please visit your <a
href='/db/sites/index.php?id=$site_id'>site details</a> page to find
out more about your site's nodes, and how to contact your site's PI(s)
and Technical Contact(s).</p>
EOF;
     echo $message;
 
  } else {
    // xxx this is a rough cut and paste from the former UI
    // showing a datepicker view could be considered as well with some extra work
    // calculate possible extension lengths
    $selectors = array();
    foreach ( array ( 1 => "One more week", 
 		      2 => "Two more weeks", 
 		      3 => "Three more weeks", 
 		      4 => "One more month" ) as $weeks => $text ) {
      $candidate_exp = $current_exp + $weeks*$WEEK;
      if ( $candidate_exp < $max_exp) {
	$selectors []= array('display'=>"$text (" . gmstrftime("%A %b-%d-%y %T %Z", $candidate_exp) . ")",
			     'value'=>$candidate_exp);
	$max_renewal_weeks=$weeks;
	$max_renewal_date= gmstrftime("%A %b-%d-%y %T %Z", $candidate_exp);
      }
    }

    if ( empty( $selectors ) ) {
      print <<< EOF
<div class='my-slice-renewal'>
Slices cannot be renewed more than $MAX_WEEKS weeks from now, i.e. not beyond $max_text. 
For this reason, the current slice cannot be renewed any further into the future, try again closer to expiration date.
</div>
EOF;
     } else {
      print <<< EOF
<div class='my-slice-renewal'>
<span class='bold'>Important:</span> Please take this opportunity to review and update your slice information in the Details tab.
<p>
PlanetLab's security model requires that anyone who is concerned about a slice's activity be able to immediately learn about that slice. The details that you provide are your public explanation about why the slice behaves as it does. Be sure to describe the <span class='bold'>kind of traffic</span> that your slice generates, and how it handles material that is under <span class='bold'>copyright</span>, if relevant.
</p><p>
The PlanetLab Operations Centres regularly respond to concerns raised by third parties about site behaviour. Most incidents are resolved rapidly based upon the publicly posted slice details. However, when these details are not sufficiently clear or accurate, and we cannot immediately reach the slice owner, we must delete the slice. 
</p>
EOF;

      $form = new PlekitForm (l_actions(),
			      array('action'=>'renew-slice',
				    'slice_id'=>$slice['slice_id']));
      $form->start();
      print $form->label_html('expires','Duration:&nbsp;');
      print $form->select_html('expires',$selectors,array('label'=>'Pick one'));
      print $form->submit_html('renew-button','Renew');
      $form->end();

print("<p><i>NOTE: Slices cannot be renewed beyond another $max_renewal_weeks week(s) ($max_renewal_date).</i>  </p>");
print ("</div>");
    }
  }
 
  $toggle->end();
}

////////////////////////////////////////////////////////////

$am_in_slice = in_array(plc_my_person_id(),$person_ids);

if ($am_in_slice) {
  drupal_set_title("My slice " . $name);
 } else {
  drupal_set_title("Slice " . $name);
}

$privileges = ( $local_peer && (plc_is_admin()  || plc_is_pi() || $am_in_slice));
$tags_privileges = $privileges || plc_is_admin();

$tabs=array();
$tabs [] = tab_nodes_slice($slice_id);
$tabs [] = tab_site($site);

// are these the right privileges for deletion ?
if ($privileges) {
  $tabs ['Delete']= array('url'=>l_actions(),
			  'method'=>'post',
			  'values'=>array('action'=>'delete-slice','slice_id'=>$slice_id),
			  'bubble'=>"Delete slice $name",
			  'confirm'=>"Are you sure to delete slice $name");

  $tabs["Events"]=array_merge(tablook_event(),
			      array('url'=>l_event("Slice","slice",$slice_id),
				    'bubble'=>"Events for slice $name"));
  $tabs["Comon"]=array_merge(tablook_comon(),
			     array('url'=>l_comon("slice_id",$slice_id),
				   'bubble'=>"Comon page about slice $name"));
}

plekit_linetabs($tabs);

////////////////////////////////////////
$peers->block_start($peer_id);

//////////////////////////////////////// renewal area 
// (1) close to expiration : show on top and open

if ($local_peer ) {
  $renew_visible = renew_needed ($slice);
  if ($renew_visible) renew_area ($slice,$site,true);
 }


//////////////////////////////////////////////////////////// tab:details
$toggle = 
  new PlekitToggle ('my-slice-details',"Details",
		    array('bubble'=>
			  'Display and modify details for that slice',
			  'visible'=>get_arg('show_details')));
$toggle->start();

$details=new PlekitDetails($privileges);
$details->form_start(l_actions(),array('action'=>'update-slice',
				       'slice_id'=>$slice_id,
				       'name'=>$name));

$details->start();
if (! $local_peer) {
  $details->th_td("Peer",$peers->peer_link($peer_id));
  $details->space();
 }


$details->th_td('Name',$slice['name']);
$details->th_td('Description',$slice['description'],'description',
		array('input_type'=>'textarea',
		      'width'=>50,'height'=>5));
$details->th_td('URL',$slice['url'],'url',array('width'=>50));
$details->tr_submit("submit","Update Slice");
#$details->th_td('时效',$expires);
$details->th_td('Expires',$expires);
$details->th_td('Instantiation',$slice['instantiation']);
$details->th_td("OMF-friendly", ($slice['omf_control'] ? 'Yes' : 'No') . " [to change: see 'omf_control' in the tags section below]");
$details->th_td('Site',l_site_obj($site));
// xxx show the PIs here
//$details->th_td('PIs',...);
$details->end();

$details->form_end();
$toggle->end();

//////////////////////////////////////////////////////////// tab:persons
$person_columns = array('email','person_id','first_name','last_name','roles');
// get persons in slice
if (!empty($person_ids))
  $persons=$api->GetPersons(array('person_id'=>$slice['person_ids']),$person_columns);
// just propose to add everyone else
// xxx this is maybe too much for admins as it slows stuff down 
// as regular persons can see only a fraction of the db anyway
$potential_persons=
  $api->GetPersons(array('~person_id'=>$slice['person_ids'],
			 'peer_id'=>NULL,
			 'enabled'=>true),
		   $person_columns);
$count=count($persons);

if ($profiling) plc_debug_prof('04: persons',count($persons));
$toggle=
  new PlekitToggle ('my-slice-persons',"$count users",
		    array('bubble'=>
			  'Manage accounts attached to this slice',
			  'visible'=>get_arg('show_persons')));
$toggle->start();

////////// people currently in
// visible:
// hide if both current+add are included
// so user can chose which section is of interest
// show otherwise
$toggle_persons = new PlekitToggle ('my-slice-persons-current',
				    "$count people currently in $name",
				    array('visible'=>get_arg('show_persons_current')));
$toggle_persons->start();

$headers=array();
$headers['email']='string';
$headers['first']='string';
$headers['last']='string';
$headers['R']='string';
if ($privileges) $headers[plc_delete_icon()]="none";
$table=new PlekitTable('persons',$headers,'0',
		       array('notes_area'=>false));
$form=new PlekitForm(l_actions(),array('slice_id'=>$slice['slice_id']));
$form->start();
$table->start();
if ($persons) foreach ($persons as $person) {
  $table->row_start();
  $table->cell(l_person_obj($person));
  $table->cell($person['first_name']);
  $table->cell($person['last_name']);
  $table->cell(plc_vertical_table ($person['roles']));
  if ($privileges) $table->cell ($form->checkbox_html('person_ids[]',$person['person_id']));
  $table->row_end();
}
// actions area
if ($privileges) {

  // remove persons
  $table->tfoot_start();

  $table->row_start();
  $table->cell($form->submit_html ("remove-persons-from-slice","Remove selected"),
	       array('hfill'=>true,'align'=>'right'));
  $table->row_end();
 }
$table->end();
$toggle_persons->end();

////////// people to add
if ($privileges) {
  $count=count($potential_persons);
  $toggle_persons = new PlekitToggle ('my-slice-persons-add',
				      "$count people may be added to $name",
				      array('visible'=>get_arg('show_persons_add')));
  $toggle_persons->start();
  if ( ! $potential_persons ) {
    // xxx improve style
    echo "<p class='not-relevant'>No person to add</p>";
  } else {
    $headers=array();
    $headers['email']='string';
    $headers['first']='string';
    $headers['last']='string';
    $headers['R']='string';
    $headers['+']="none";
    $options = array('notes_area'=>false,
		     'search_width'=>15,
		     'pagesize'=>8);
    // show search for admins only as other people won't get that many names to add
    if ( ! plc_is_admin() ) $options['search_area']=false;
    
    $table=new PlekitTable('add_persons',$headers,'0',$options);
    $form=new PlekitForm(l_actions(),array('slice_id'=>$slice['slice_id']));
    $form->start();
    $table->start();
    if ($potential_persons) foreach ($potential_persons as $person) {
	$table->row_start();
	$table->cell(l_person_obj($person));
	$table->cell($person['first_name']);
	$table->cell($person['last_name']);
	$table->cell(plc_vertical_table ($person['roles']));
	$table->cell ($form->checkbox_html('person_ids[]',$person['person_id']));
	$table->row_end();
      }
    // add users
    $table->tfoot_start();
    $table->row_start();
    $table->cell($form->submit_html ("add-persons-in-slice","Add selected"),
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();
    $table->end();
    $form->end();
  }
  $toggle_persons->end();
}
$toggle->end();

//////////////////////////////////////////////////////////// tab:nodes
// the nodes details to display here
// (1) we search for the tag types for which 'category' matches 'node*/ui*'
// all these tags will then be tentatively displayed in this area
// (2) further information can also be optionally specified in the category:
//     (.) we split the category with '/' and search for assignments of the form var=value
//     (.) header can be set to supersede the column header (default is tagname)
//     (.) rank can be used for ordering the columns (default is tagname)
//     (.) type is passed to the javascript table, for sorting (default is 'string')

// minimal list as a start
$node_fixed_columns = array('hostname','node_id','peer_id','slice_ids_whitelist', 'site_id',
			    'run_level','boot_state','last_contact','node_type');
// create a VisibleTags object : basically the list of tag columns to show
//$visibletags = new VisibleTags ($api, 'node');
//$visiblecolumns = $visibletags->column_names();

// optimizing calls to GetNodes
//$all_nodes=$api->GetNodes(NULL,$node_columns);
//$slice_nodes=$api->GetNodes(array('node_id'=>$slice['node_ids']),$node_columns);
//$potential_nodes=$api->GetNodes(array('~node_id'=>$slice['node_ids']),$node_columns);


//NEW CODE FOR ENABLING COLUMN CONFIGURATION

//prepare fix and configurable columns

$fix_columns = array();
$fix_columns[]=array('tagname'=>'hostname', 'header'=>'hostname', 'type'=>'string', 'title'=>'The name of the node');
$fix_columns[]=array('tagname'=>'peer_id', 'header'=>'AU', 'type'=>'string', 'title'=>'Authority');
$fix_columns[]=array('tagname'=>'run_level', 'header'=>'ST', 'type'=>'string', 'title'=>'Status');
$fix_columns[]=array('tagname'=>'node_type', 'header'=>'RES', 'type'=>'string', 'title'=>'Reservable');

// columns that correspond to the visible tags for nodes (*node/ui*)
$visibletags = new VisibleTags ($api, 'node');
$visibletags->columns();
$tag_columns = $visibletags->headers();

//columns that are not defined as extra myslice tags
$extra_columns = array();
//MyPLC columns
$extra_columns[]=array('tagname'=>'sitename', 'header'=>'SN', 'type'=>'string', 'title'=>'Site name', 'fetched'=>true, 'source'=>'myplc');
$extra_columns[]=array('tagname'=>'domain', 'header'=>'DN', 'type'=>'string', 'title'=>'Toplevel domain name', 'fetched'=>true, 'source'=>'myplc');
$extra_columns[]=array('tagname'=>'ipaddress', 'header'=>'IP', 'type'=>'string', 'title'=>'IP Address', 'fetched'=>true, 'source'=>'myplc');
$extra_columns[]=array('tagname'=>'fcdistro', 'header'=>'OS', 'type'=>'string', 'title'=>'Operating system', 'fetched'=>false, 'source'=>'myplc');
$extra_columns[]=array('tagname'=>'date_created', 'header'=>'DA', 'source'=>'myplc', 'type'=>'date', 'title'=>'Date added', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'arch', 'header'=>'A', 'source'=>'myplc', 'type'=>'string', 'title'=>'Architecture', 'fetched'=>false);
if (plc_is_admin()) {
$extra_columns[]=array('tagname'=>'deployment', 'header'=>'DL', 'source'=>'myplc', 'type'=>'string', 'title'=>'Deployment', 'fetched'=>false);
}

//CoMon Live data

if (MYSLICE_COMON_AVAILABLE)
{
$extra_columns[]=array('tagname'=>'bwlimit', 'header'=>'BW', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Bandwidth limit', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'numcores', 'header'=>'CC', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Number of CPU Cores', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'cpuspeed', 'header'=>'CR', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'CPU clock rate', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'disksize', 'header'=>'DS', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Disk size', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'gbfree', 'header'=>'DF', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Currently available disk space', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'memsize', 'header'=>'MS', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Memory size', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'numslices', 'header'=>'SM', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Number of slices in memory', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'uptime', 'header'=>'UT', 'source'=>'comon', 'type'=>'sortAlphaNumericTop', 'title'=>'Continuous uptime until now', 'fetched'=>false);
}

//TopHat Live data

if (MYSLICE_TOPHAT_AVAILABLE)
{
$extra_columns[]=array('tagname'=>'asn', 'header'=>'AS', 'source'=>'tophat', 'type'=>'string', 'title'=>'AS Number', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'city', 'header'=>'LCY', 'source'=>'tophat', 'type'=>'string', 'title'=>'City', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'region', 'header'=>'LRN', 'source'=>'tophat', 'type'=>'string', 'title'=>'Region', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'country', 'header'=>'LCN', 'source'=>'tophat', 'type'=>'string', 'title'=>'Country', 'fetched'=>false);
$extra_columns[]=array('tagname'=>'continent', 'header'=>'LCT', 'source'=>'tophat', 'type'=>'string', 'title'=>'Continent', 'fetched'=>false);
//$extra_columns[]=array('tagname'=>'hopcount', 'header'=>'HC', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Hop count from reference node', 'fetched'=>false);
////$extra_columns[]=array('tagname'=>'rtt', 'header'=>'RTT', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Round trip time from reference node', 'fetched'=>false);
//////$extra_columns[]=array('tagname'=>'agents', 'header'=>'MA', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Co-located measurement agents', 'fetched'=>true);
////$extra_columns[]=array('tagname'=>'agents_sonoma', 'header'=>'MAS', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Co-located SONoMA agents', 'fetched'=>true);
////$extra_columns[]=array('tagname'=>'agents_etomic', 'header'=>'MAE', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Co-located ETOMIC agents', 'fetched'=>true);
////$extra_columns[]=array('tagname'=>'agents_tdmi', 'header'=>'MAT', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Co-located TDMI agents', 'fetched'=>true);
////$extra_columns[]=array('tagname'=>'agents_dimes', 'header'=>'MAD', 'source'=>'tophat', 'type'=>'sortAlphaNumericTop', 'title'=>'Co-located DIMES agents', 'fetched'=>true);
}



//Get user's column configuration

$first_time_configuration = false;
$default_configuration = "hostname:f|ST:f|AU:f|RES:f";
//$extra_default = "";
$column_configuration = "";
$slice_column_configuration = "";

$show_configuration = "";

$PersonTags=$api->GetPersonTags (array('person_id'=>$plc->person['person_id']));
//plc_debug('ptags',$PersonTags);
foreach ($PersonTags as $ptag) {
  if ($ptag['tagname'] == 'columnconf') {
    $column_configuration = $ptag['value'];
    $conf_tag_id = $ptag['person_tag_id'];
  } else if ($ptag['tagname'] == 'showconf') {
    $show_configuration = $ptag['value'];
    $show_tag_id = $ptag['person_tag_id'];
  }
}

$sliceconf_exists = false;
if ($column_configuration == "") {
  $first_time_configuration = true;
  $column_configuration = $slice_id.";default";
  $sliceconf_exists = true;
} else {
  $slice_conf = explode(";",$column_configuration);
  for ($i=0; $i<count($slice_conf); $i++ ) {
    if ($slice_conf[$i] == $slice_id) {
      $i++;
      $slice_column_configuration = $slice_conf[$i];
      $sliceconf_exists = true;
      break;
    } else {
      $i++;
      $slice_column_configuration = $slice_conf[$i];
    }
  }        
}

if ($sliceconf_exists == false)
  $column_configuration = $column_configuration.";".$slice_id.";default";

if ($slice_column_configuration == "")
  $full_configuration = $default_configuration;
else
  $full_configuration = $default_configuration."|".$slice_column_configuration;


//instantiate the column configuration class, which prepares the headers array
$ConfigureColumns =new PlekitColumns($full_configuration, $fix_columns, $tag_columns, $extra_columns);

$visiblecolumns = $ConfigureColumns->node_tags();

$node_columns=array_merge($node_fixed_columns,$visiblecolumns);
$all_nodes=$api->GetNodes(NULL,$node_columns);

$ConfigureColumns->fetch_live_data($all_nodes);

$show_reservable_info = TRUE;
$show_layout_info = '1';
$show_conf = explode(";",$show_configuration);
foreach ($show_conf as $ss) {
  if ($ss =="reservable")
    $show_reservable_info = FALSE;
  else if ($ss =="columns")
    $show_layout_info = '0';
}        

$slice_nodes=array();
$potential_nodes=array();
$reservable_nodes=array();
foreach ($all_nodes as $node) {
  if (in_array($node['node_id'],$slice['node_ids'])) {
    $slice_nodes[]=$node;
    if ($node['node_type']=='reservable') $reservable_nodes[]=$node;
  } else {
    $potential_nodes[]=$node;
  }
}
if ($profiling) plc_debug_prof('05: nodes',count($slice_nodes));
////////////////////
// outline the number of reservable nodes
$nodes_message=count_english($slice_nodes,"node");
if (count($reservable_nodes)) $nodes_message .= " (" . count($reservable_nodes) . " reservable)";
$toggle=new PlekitToggle ('my-slice-nodes',$nodes_message,
			  array('bubble'=>
				'Manage nodes attached to this slice',
				'visible'=>get_arg('show_nodes')));
$toggle->start();


//////////////////// reservable nodes area
$leases_info="
You have attached one or more reservable nodes to your slice. 
Reservable nodes show up with the '$mark' mark. 
Your slivers will be available only during timeslots
where you have obtained leases. 
You can manage your leases in the tab below.
<br>
This feature is still experimental; feedback is appreciated at <a href='mailto:devel@planet-lab.org'>devel@planet-lab.org</a>
";
$count=count($reservable_nodes);
if ($count && $privileges) {
  // include leases.js only if needed
  drupal_set_html_head('<script src="/planetlab/slices/leases.js" type="text/javascript" charset="utf-8"></script>');

  // having reservable nodes in white lists looks a bit off scope for now...
  $toggle_nodes=new PlekitToggle('my-slice-nodes-reserve',
				 "Leases - " . count($reservable_nodes) . " reservable node(s)",
				 array('visible'=>get_arg('show_nodes_resa'), 
				       'info-text'=>$leases_info,
				       'info-visible'=>$show_reservable_info));
  $toggle_nodes->start();

  // get settings from environment, otherwise set to defaults
  // when to start, in hours in the future from now
  $leases_offset=$_GET['leases_offset'];
  if ( ! $leases_offset ) $leases_offset=0;
  // how many timeslots to show
  $leases_slots=$_GET['leases_slots'];
  if ( ! $leases_slots ) $leases_slots = 36;
  // offset in hours (in the future) from now 
  $leases_w = $_GET['leases_w'];
  if ( ! $leases_w) $leases_w=18;
  // number of timeslots to display

  $granularity=$api->GetLeaseGranularity();

  // these elements are for passing data to the javascript layer
  echo "<span class='hidden' id='leases_slicename'>" . $slice['name'] . "</span>";
  echo "<span class='hidden' id='leases_slice_id'>" . $slice['slice_id']. "</span>";
  echo "<span class='hidden' id='leases_granularity'>" . $granularity . "</span>";
  // ditto, and editable - very rough for now
  echo "<div class='center' id='leases_settings'>";
  echo "<label id='leases_offset_label' class='leases_label'>start, in hours from now</label>";
  echo "<input type='text' class='leases_input' id='leases_offset_input' value='$leases_offset' />";
  echo "<label id='leases_slots_label' class='leases_label'># of timeslots</label>";
  echo "<input type='text' class='leases_input' id='leases_slots_input' value='$leases_slots' />";
  echo "<label id='leases_w_label' class='leases_label'>slot width, in pixels</label>";
  echo "<input type='text' class='leases_input' id='leases_w_input' value='$leases_w' />";
  echo "</div>";

  // leases_data is the name used by leases.js to locate this place
  // first population will be triggered by init_scheduler from leases.js
  echo "<table id='leases_data' class='hidden'></table>";

  // the general layout for the scheduler
  echo <<< EOF
<div id='leases_area'></div>

<div id='leases_buttons'>
    <button id='leases_refresh' type='submit'>Refresh (Pull)</button>
    <button id='leases_submit' type='submit'>Submit (Push)</button>
</div>
EOF;

  $toggle_nodes->end();
 }

if ($profiling) plc_debug_prof('06: leases',0);

//////////////////// node configuration panel
if ($first_time_configuration) 
$column_conf_visible = '1';
else
$column_conf_visible = '0';

$layout_info='
This tab allows you to customize the columns in the node tables,
below. Information on the nodes comes from a variety of monitoring
sources. If you, as either a user or a provider of monitoring data,
would like to see additional columns made available, please send us
your request in mail to <a
href="mailto:testbed@fnic.cn">testbed@fnic.cn</a>. You can
find more information about the MyCeni project at <a
href="http://myceni.ict.ac.cn:8000">http://myceni.fnic.cn:8000</a>.
';
$toggle_nodes=new PlekitToggle('my-slice-nodes-configuration',
                               "Node table layout",
                               array('info-text'=>$layout_info,
				     'info-visible'=>$show_layout_info));
$toggle_nodes->start();

//usort ($table_headers, create_function('$col1,$col2','return strcmp($col1["header"],$col2["header"]);'));
//print("<p>TABLE HEADERS<p>");
//print_r($table_headers);

print("<div id='debug'></div>");
print("<input type='hidden' id='slice_id' value='".$slice['slice_id']."' />");
print("<input type='hidden' id='person_id' value='".$plc->person['person_id']."' />");
print("<input type='hidden' id='conf_tag_id' value='".$conf_tag_id."' />");
print("<input type='hidden' id='show_tag_id' value='".$show_tag_id."' />");
print("<input type='hidden' id='show_configuration' value='".$show_configuration."' />");
print("<input type='hidden' id='column_configuration' value='".$slice_column_configuration."' />");
print("<br><input type='hidden' size=80 id='full_column_configuration' value='".$column_configuration."' />");
print("<input type='hidden' id='previousConf' value='".$slice_column_configuration."' />");
print("<input type='hidden' id='defaultConf' value='".$default_configuration."' />");

if ($profiling) plc_debug_prof('07: before configuration_panel',0);
$ConfigureColumns->configuration_panel_html(true);

if ($profiling) plc_debug_prof('08: before javascript_init',0);
$ConfigureColumns->javascript_init();

$toggle_nodes->end();

if ($profiling) plc_debug_prof('09: layout',0);

$all_sites=$api->GetSites(NULL, array('site_id','login_base'));
$site_hash=array();
foreach ($all_sites as $tmp_site) $site_hash[$tmp_site['site_id']]=$tmp_site['login_base'];

$interface_columns=array('ip','node_id','interface_id');
$interface_filter=array('is_primary'=>TRUE);
$interfaces=$api->GetInterfaces($interface_filter,$interface_columns);

$interface_hash=array();
foreach ($interfaces as $interface) $interface_hash[$interface['node_id']]=$interface;


if ($profiling) plc_debug_prof('10: interfaces',count($interfaces));

//////////////////// nodes currently in
$toggle_nodes=new PlekitToggle('my-slice-nodes-current',
			       count_english($slice_nodes,"node") . " currently in $name",
			       array('visible'=>get_arg('show_nodes_current')));
$toggle_nodes->start();

$headers=array();
$notes=array();
//$notes=array_merge($notes,$visibletags->notes());
$notes [] = "For information about the different columns please see the <b>node table layout</b> tab above or <b>mouse over</b> the column headers";

/*
$headers['peer']='string';
$headers['hostname']='string';
$short="-S-"; $long=Node::status_footnote(); $type='string'; 
	$headers[$short]=array('type'=>$type,'title'=>$long); $notes []= "$short = $long";
$short=reservable_mark(); $long=reservable_legend(); $type='string';
	$headers[$short]=array('type'=>$type,'title'=>$long); $notes []= "$short = $long";
// the extra tags, configured for the UI
$headers=array_merge($headers,$visibletags->headers());

if ($privileges) $headers[plc_delete_icon()]="none";
*/

$edit_header = array();
if ($privileges) $edit_header[plc_delete_icon()]="none";
$headers = array_merge($ConfigureColumns->get_headers(),$edit_header);

//print("<p>HEADERS<p>");
//print_r($headers);

$table_options = array('notes'=>$notes,
                       'search_width'=>15,
                       'pagesize'=>20,
			'configurable'=>true);

$table=new PlekitTable('nodes',$headers,NULL,$table_options);

$form=new PlekitForm(l_actions(),array('slice_id'=>$slice['slice_id']));
$form->start();
$table->start();
if ($slice_nodes) foreach ($slice_nodes as $node) {
  $table->row_start();

  $table->cell($node['node_id'], array('display'=>'none'));

  $table->cell(l_node_obj($node));
  $peers->cell($table,$node['peer_id']);
  $run_level=$node['run_level'];
  list($label,$class) = Node::status_label_class_($node);
  $table->cell ($label,array('class'=>$class));
  $table->cell( ($node['node_type']=='reservable')?reservable_mark():"" );

  $hostname=$node['hostname'];
  $ip=$interface_hash[$node['node_id']]['ip'];
  $interface_id=$interface_hash[$node['node_id']]['interface_id'];

//extra columns
$node['domain'] = topdomain($hostname);
$node['sitename'] = l_site_t($node['site_id'],$site_hash[$node['site_id']]);
if ($interface_id)
        $node['ipaddress'] = l_interface_t($interface_id,$ip);
  else
        $node['ipaddress'] = "n/a";

 //foreach ($visiblecolumns as $tagname) $table->cell($node[$tagname]);
 $ConfigureColumns->cells($table, $node);

  if ($privileges) $table->cell ($form->checkbox_html('node_ids[]',$node['node_id']));
  $table->row_end();
}
// actions area
if ($privileges) {

  // remove nodes
  $table->tfoot_start();

  $table->row_start();
  $table->cell($form->submit_html ("remove-nodes-from-slice","Remove selected"),
	       array('hfill'=>true,'align'=>'right'));
  $table->row_end();
 }
$table->end();
$toggle_nodes->end();

if ($profiling) plc_debug_prof('11: nodes in',count($slice_nodes));

//////////////////// nodes to add
if ($privileges) {
  $new_potential_nodes = array();
  if ($potential_nodes) foreach ($potential_nodes as $node) {
      $emptywl=empty($node['slice_ids_whitelist']);
      $inwl = (!emptywl) and in_array($slice['slice_id'],$node['slice_ids_whitelist']);
      if ($emptywl or $inwl)
	$new_potential_nodes[]=$node;
  }
  $potential_nodes=$new_potential_nodes;

  $count=count($potential_nodes);
  $toggle_nodes=new PlekitToggle('my-slice-nodes-add',
				 count_english($potential_nodes,"more node") . " available",
				 array('visible'=>get_arg('show_nodes_add')));
  $toggle_nodes->start();

  if ( $potential_nodes ) {
    $headers=array();
    $notes=array();


/*
    $headers['peer']='string';
    $headers['hostname']='string';
    $short="-S-"; $long=Node::status_footnote(); $type='string'; 
	$headers[$short]=array('type'=>$type,'title'=>$long); $notes []= "$short = $long";
	$short=reservable_mark(); $long=reservable_legend(); $type='string';
	$headers[$short]=array('type'=>$type,'title'=>$long); $notes []= "$short = $long";
    // the extra tags, configured for the UI
    $headers=array_merge($headers,$visibletags->headers());
    $headers['+']="none";
*/

    $add_header = array();
    $add_header['+']="none";
    $headers = array_merge($ConfigureColumns->get_headers(),$add_header);

    //$notes=array_merge($notes,$visibletags->notes());
$notes [] = "For information about the different columns please see the <b>node table layout</b> tab above or <b>mouse over</b> the column headers";
    
    $table=new PlekitTable('add_nodes',$headers,NULL, $table_options);
    $form=new PlekitForm(l_actions(),
			 array('slice_id'=>$slice['slice_id']));
    $form->start();
    $table->start();
    if ($potential_nodes) foreach ($potential_nodes as $node) {
	$table->row_start();

	$table->cell($node['node_id'], array('display'=>'none'));

	$table->cell(l_node_obj($node));
	$peers->cell($table,$node['peer_id']);
	list($label,$class) = Node::status_label_class_($node);
	$table->cell ($label,array('class'=>$class));
	$table->cell( ($node['node_type']=='reservable')?reservable_mark():"" );

	//extra columns
	  $hostname=$node['hostname'];
	  $ip=$interface_hash[$node['node_id']]['ip'];
	  $interface_id=$interface_hash[$node['node_id']]['interface_id'];
	$node['domain'] = topdomain($hostname);
	$node['sitename'] = l_site_t($node['site_id'],$site_hash[$node['site_id']]);
	$node['ipaddress'] = l_interface_t($interface_id,$ip);

	//foreach ($visiblecolumns as $tagname) $table->cell($node[$tagname]);
  	$ConfigureColumns->cells($table, $node);

	$table->cell ($form->checkbox_html('node_ids[]',$node['node_id']));
	$table->row_end();
      }
    // add nodes
    $table->tfoot_start();
    $table->row_start();
    $table->cell($form->submit_html ("add-nodes-in-slice","Add selected"),
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();
    $table->end();
    $form->end();
  }
  $toggle_nodes->end();
}

$toggle->end();

if ($profiling) plc_debug_prof('12: nodes to add',count($potential_nodes));

//////////////////////////////////////// retrieve all slice tags
$tags=$api->GetSliceTags (array('slice_id'=>$slice_id));
//////////////////////////////////////////////////////////// tab:initscripts
// xxx fixme
// * add a message on how to use this:
// * explain the 2 mechanisms (initscript_code, initscript)
// * explain the interface : initscript start|stop|restart slicename
// xxx fixme

$initscript_info="
There are two ways to attach an initscript to a slice:<ul>

<li> <span class='bold'> Shared initscripts </span> are global to the
MyPLC, and managed by the Operations Team. For that reason, regular
users cannot change these scripts, but can reference one of the
available names in the drop down below.  </li>

<li> You also have the option to provide <span class='bold'> your own
code </span>, with the following conventions: <ul>

<li> Like regular initscripts, your script must expect to receive as a
first argument <span class='bold'> start </span>, <span class='bold'>
stop </span> or <span class='bold'> restart </span>. It is important
to honor this argument, as your slice may be stopped and restarted at
any time; also this is used whenever the installed code gets changed.
</li>

<li> As a second argument, you will receive the slicename; in most
cases this can be safely ignored.  </li>

</ul>
</li>
 </ul>
The slice-specific setting has precedence on a shared initscript.
";

$shared_initscripts=$api->GetInitScripts(array('-SORT'=>'name'),array('name'));
//$shared_initscripts=$api->GetInitScripts();
if ($profiling) plc_debug_prof('13: initscripts',count($initscripts));
// xxx expose this even on foreign slices for now
if ($local_peer) {
  $initscript='';
  $initscript_code='';
  if ($tags) foreach ($tags as $tag) {
      if ($tag['tagname']=='initscript') {
	if ($initscript!='') drupal_set_error("multiple occurrences of 'initscript' tag");
	$initscript=$tag['value'];
      }
      if ($tag['tagname']=='initscript_code') {
	if ($initscript_code!='') drupal_set_error("multiple occurrences of 'initscript_code' tag");
	$initscript_code=$tag['value'];
	// plc_debug_txt('retrieved body',$initscript_code);
      }
    }
  $label="No initscript";
  $trimmed=trim($initscript_code);
  if (!empty($trimmed)) $label="Initscript : slice-specific (" . substr($initscript_code,0,20) . " ...)";
  else if (!empty($initscript)) $label="Initscript: shared " . $initscript;

  $toggle = new PlekitToggle('slice-initscripts',$label,
			     array('bubble'=>'Manage initscript on that slice',
				   'visible'=>get_arg('show_initscripts'),
				   'info-text'=>$initscript_info
				   // not messing with persontags to guess whether this should be displayed or not
				   // hopefully some day toggle will know how to handle that using web storage
				   ));
  $toggle->start();

  $details=new PlekitDetails(TRUE);
  // we expose the previous values so that actions.php can know if changes are really needed
  // the code needs to be encoded as it may contain any character
  // as far as the code, this does not work too well b/c what actions.php receives
  // seems to have spurrious \r chars, and the comparison between old and new values 
  // is not reliable, which results in changes being made although the code hasn't changed
  // hve spent too much time on this, good enough for now...
  $details->form_start(l_actions(),array('action'=>'update-initscripts',
					 'slice_id'=>$slice_id,
					 'name'=>$name,
					 'previous-initscript'=>$initscript,
					 'previous-initscript-code'=>htmlentities($initscript_code)));
  $details->start();
  // comppute a pulldown with available names
  $selectors=array();
  $is_found=FALSE;
  if ($shared_initscripts) foreach ($shared_initscripts as $is) {
      $is_selector=array('display'=>$is['name'],'value'=>$is['name']);
      if ($is['name']==$initscript) {
	$is_selector['selected']=TRUE;
	$is_found=TRUE;
      }
      $selectors[]=$is_selector;
    }
  // display a warning when initscript references an unknown script
  $details->tr_submit('unused','Update initscripts');
  ////////// by name
  $details->th_td("shared initscript name",
		  $details->form()->select_html('initscript',$selectors,array('label'=>'none')),
		  'initscript',
		  array('input_type'=>'select'));
  if ($initscript && ! $is_found) 
    // xxx better rendering ?
    $details->th_td('WARNING',plc_warning_html("Current name '" . $initscript . "' is not a known shared initscript name"));
  ////////// by contents
  $script_height=8;
  $script_width=60;
  if ($initscript_code) {
    $text=explode("\n",$initscript_code);
    $script_height=count($text);
    $script_width=10;
    foreach ($text as $line) $script_width=max($script_width,strlen($line));
  }
  $details->th_td('slice initscript',$initscript_code,'initscript-code',
		  array('input_type'=>'textarea', 'width'=>$script_width,'height'=>$script_height));
  $details->tr_submit('unused','Update initscripts');
  $details->form_end();
  $details->end();  
  $toggle->end();
}

//////////////////////////////////////////////////////////// tab:tags
// very wide values get abbreviated
$tag_value_threshold=24;
// xxx fixme
// * this area could use a help message about some special tags:
// * initscript-related should be taken out
// * sliverauth-related (ssh_key & hmac) should have a toggle to hide or show
// xxx fixme

// xxx expose this even on foreign slices for now
//if ( $local_peer ) {
  if ($profiling) plc_debug_prof('14: slice tags',count($tags));
  function get_tagname ($tag) { return $tag['tagname'];}
  $tagnames = array_map ("get_tagname",$tags);
  
  $toggle = new PlekitToggle ('slice-tags',count_english_warning($tags,'tag'),
			      array('bubble'=>'Inspect and set tags on that slice',
				    'visible'=>get_arg('show_tags')));
  $toggle->start();
  
  $headers=array(
    "Name"=>"string",
    "Value"=>"string",
    "Node"=>"string",
    "NodeGroup"=>"string");
  if ($tags_privileges) $headers[plc_delete_icon()]="none";
  
  $table_options=array("notes_area"=>false,"pagesize_area"=>false,"search_width"=>10);
  $table=new PlekitTable("slice_tags",$headers,'0',$table_options);
  $form=new PlekitForm(l_actions(),
                       array('slice_id'=>$slice['slice_id']));
  $form->start();
  $table->start();
  if ($tags) {
    // Get hostnames for nodes in a single pass
    $_node_ids = array();
    foreach ($tags as $tag) {
      if ($tag['node_id']) {
        array_push($_node_ids, $tag['node_id']);
      }
    }
    $_nodes = $api->GetNodes(array('node_id' => $_node_ids), array('node_id', 'hostname'));
    $_hostnames = array();
    foreach ($_nodes as $_node) {
      $_hostnames[$_node['node_id']] = $_node['hostname'];
    }

    // Loop through tags again to display
    foreach ($tags as $tag) {
      $node_name = "ALL";
      if ($tag['node_id']) {
        $node_name = $_hostnames[$tag['node_id']];
      }
      $nodegroup_name="n/a";
      if ($tag['nodegroup_id']) { 
        $nodegroups=$api->GetNodeGroups(array('nodegroup_id'=>$tag['nodegroup_id']));
	if ($profiling) plc_debug_prof('15: nodegroup for slice tag',$nodegroup);
        if ($nodegroup) {
          $nodegroup = $nodegroups[0];
          $nodegroup_name = $nodegroup['groupname'];
        }
      }
      $table->row_start();
      $table->cell(l_tag_obj($tag));
      // very wide values get abbreviated
      $table->cell(truncate_and_popup($tag['value'],$tag_value_threshold));
      $table->cell($node_name);
      $table->cell($nodegroup_name);
      if ($tags_privileges) $table->cell ($form->checkbox_html('slice_tag_ids[]',$tag['slice_tag_id']));
      $table->row_end();
    }
  }
  if ($tags_privileges) {
    $table->tfoot_start();
    $table->row_start();
    $table->cell($form->submit_html ("delete-slice-tags","Remove selected"),
                 array('hfill'=>true,'align'=>'right'));
    $table->row_end();
    
    $table->row_start();
    function tag_selector ($tag) {
      return array("display"=>$tag['tagname'],"value"=>$tag['tag_type_id']);
    }
    $all_tags= $api->GetTagTypes( array ("category"=>"*slice*","-SORT"=>"+tagname"), array("tagname","tag_type_id"));
    if ($profiling) plc_debug_prof('16: tagtypes',count($all_tags));
    $selector_tag=array_map("tag_selector",$all_tags);
    
    function node_selector($node) { 
      return array("display"=>$node["hostname"],"value"=>$node['node_id']);
    }
    $selector_node=array_map("node_selector",$slice_nodes);
    
    function nodegroup_selector($ng) {
      return array("display"=>$ng["groupname"],"value"=>$ng['nodegroup_id']);
    }
    $all_nodegroups = $api->GetNodeGroups( array("groupname"=>"*"), array("groupname","nodegroup_id"));
    if ($profiling) plc_debug_prof('17: nodegroups',count($all_nodegroups));
    $selector_nodegroup=array_map("nodegroup_selector",$all_nodegroups);
    
    $table->cell($form->select_html("tag_type_id",$selector_tag,array('label'=>"Choose Tag")));
    $table->cell($form->text_html("value","",array('width'=>8)));
    $table->cell($form->select_html("node_id",$selector_node,array('label'=>"All Nodes")));
    $table->cell($form->select_html("nodegroup_id",$selector_nodegroup,array('label'=>"No Nodegroup")));
    $table->cell($form->submit_html("add-slice-tag","Set Tag"),array('columns'=>2,'align'=>'left'));
    $table->row_end();
  }
    
  $table->end();
  $form->end();
  $toggle->end();
//}


//////////////////////////////////////////////////////////// tab:renew
if ($local_peer ) {
  if ( ! $renew_visible) renew_area ($slice,$site,NULL);
 }

$peers->block_end($peer_id);

if ($profiling) plc_debug_prof_end();

// Print footer
include 'plc_footer.php';

?>
