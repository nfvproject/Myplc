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
require_once 'nifty.php';

// -------------------- 
// recognized URL arguments
$peerscope=$_GET['peerscope'];
$pattern=$_GET['pattern'];
$site_id=intval($_GET['site_id']);
$slice_id=intval($_GET['slice_id']);

// --- decoration
$title="Accounts";
$tabs=array();
$tabs []= tab_persons_mysite();

if (plc_is_admin()) {
  $tabs []= tab_persons_local();
  $tabs []= tab_persons();
}
// -------------------- 
$person_filter=array();

////////////////////
function person_status ($person) {

  $messages=array();
  
  if ( $person['peer_id'] ) {
    $class='plc-foreign';
  } else {
    $class='plc-warning';
  }
  // check that the person has keys
  if ( count($person['key_ids']) == 0)
    $messages [] = "No Key";
  if ( count($person['site_ids']) == 0)
      $messages [] = "No Site";
  if ( ! $person['enabled'] ) 
    $messages[] = "Disabled";
  if ( count ($person['roles']) == 0)
    $messages []= "No role!";
  // for tech-only people: outline user if in a slice
  if ( ( count($person['roles'])==1 ) && 
       ( in_array('tech',$person['roles']) ) ) {
    if (! empty($person["slice_ids"]) ) $messages[]="Tech in a Slice";  
  } else {
    // or for other kind of people, if they have no slice
    if ( count($person['slice_ids']) == 0) $messages [] = "No Slice";
  }
  return plc_vertical_table($messages,$class);
}


// fetch persons 
$person_columns=array('person_id','first_name','last_name','email','roles','peer_id','key_ids','site_ids','enabled','slice_ids');
// PIs and admins can see users not yet enabled
$privileges=plc_is_admin() || plc_is_pi();
if ( ! $privileges ) 
  $person_filter['enabled']=true;
// server-side filtering - set pattern in $_GET for filtering on email
if ($pattern) {
  $person_filter['email']=$pattern;
  $title .= " matching " . $pattern;
 } else {
  $person_filter['email']="*";
 }

// server-side selection on peerscope
$peerscope=new PeerScope ($api,$_GET['peerscope']);
$person_filter=array_merge($person_filter,$peerscope->filter());
$title .= ' - ' . $peerscope->label();

if ($site_id) {
  $sites=$api->GetSites(array($site_id),array("name","login_base","person_ids"));
  $site=$sites[0];
  $name=$site['name'];
  $login_base=$site['login_base'];
  $title .= t_site($site);
  $person_filter['person_id']=$site['person_ids'];
  if ($site_id != plc_my_site_id()) 
    $tabs []= tab_site($site);
}

if ($slice_id) {
  $slices=$api->GetSlices(array($slice_id),array('person_ids','name'));
  $slice=$slices[0];
  $title .= t_slice($slice);
  $tabs []= tab_slice($slice);
  $person_filter['person_id'] = $slice['person_ids'];
 }

// go
$persons=$api->GetPersons($person_filter,$person_columns);

// build site_ids - take all site_ids into account 
$site_ids=array();
if ($persons) foreach ($persons as $person) {
  if ($person['site_ids']) foreach ($person['site_ids'] as $person_site_id) {
      $site_ids []= $person_site_id;
    }
	      }

// fetch related sites
$site_columns=array('site_id','login_base');
$site_filter=array('site_id'=>$site_ids);
$sites=$api->GetSites($site_filter,$site_columns);

// hash on site_id
$site_hash=array();
foreach ($sites as $site) {
    $site_hash[$site['site_id']]=$site;
}

// --------------------
drupal_set_title($title);

plekit_linetabs($tabs);

if ( ! $persons ) {
  drupal_set_message ('No account found');
  return;
 }
  
$nifty=new PlekitNifty ('','objects-list','big');
$nifty->start();
$headers=array();
if (plc_is_admin()) $headers["I"]='int';
$headers["Peer"]="string";
$headers["First"]="string";
$headers["Last"]="string";
$headers["Email"]="string";
$headers["Site(s)" ]= "string";
$headers["R"]="string";
$headers["S" ]= "int";
$headers["Status"]="string";

// sort on email
if (! plc_is_admin()) $sort_column=3; 
// but turn off initial sort for admins as this slows stuff down terribly
else $sort_column =-1;
$table=new PlekitTable("persons",$headers,$sort_column);
$table->start();

$peers=new Peers ($api);

// write rows

foreach ($persons as $person) {
    $person_id=$person['person_id'];
    $email=$person['email'];
    $site_ids = $person['site_ids'];
    $roles = plc_vertical_table ($person['roles']);
    $peer_id=$person['peer_id'];

    $table->row_start();
    
    if (plc_is_admin()) $table->cell(href(l_person($person_id),$person_id));
    $peers->cell($table,$peer_id);
    $table->cell (href(l_person($person_id),$person['first_name']));
    $table->cell (href(l_person($person_id),$person['last_name']));
    $table->cell(l_person_t($person_id,$email));
    $site_links = array();
    foreach ($site_ids as $site_id) {
      $site=$site_hash[$site_id];
      $login_base = $site['login_base'];
      $site_links []= l_site_t($site_id,$login_base);
    }
    $table->cell(plc_vertical_table($site_links),array('only-if'=>!$peer_id));
    $table->cell($roles,array('only-if'=>!$peer_id));
    $table->cell(count($person['slice_ids']));
    $table->cell(person_status($person));
    $table->row_end();
				 
}
$notes = array();
if (plc_is_admin()) $notes[]= "I = person_id";
$notes []= "R = roles";
$notes []= "S = number of slices";
$table->end(array('notes'=>$notes));
$nifty->end();

//plekit_linetabs ($tabs,"bottom");

// Print footer
include 'plc_footer.php';


?>
