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

// -------------------- 
// recognized URL arguments
$person_id=intval($_GET['id']);
if ( ! $person_id ) { 
  plc_error('Malformed URL - id not set'); 
  return;
 }

////////////////////
// Get all columns as we focus on only one entry
// we need to mention them explicitly because we want hrn that is a tag..
$columns=array('enabled','first_name','last_name','email','url','phone','title','bio','peer_id',
	       'role_ids','roles','site_ids','slice_ids','key_ids','hrn');
$persons= $api->GetPersons( array($person_id), $columns);

if (empty($persons)) {
  drupal_set_message ("Person " . $person_id . " not found");
  return;
 }
$person=$persons[0];
  
// vars from api
$enabled= $person['enabled'];
$first_name= $person['first_name'];
$last_name= $person['last_name'];
$email= $person['email'];
$url= $person['url'];
$phone= $person['phone'];
$title= $person['title'];
$bio= $person['bio'];
$peer_id=$person['peer_id'];

// arrays from api
$role_ids= $person['role_ids'];
$roles= $person['roles'];
$site_ids= $person['site_ids'];
$slice_ids= $person['slice_ids'];
$key_ids= $person['key_ids'];
$hrn=$person['hrn'];

// gets more data from API calls
$site_columns=array( "site_id", "name", "login_base" );
$sites= $api->GetSites( $site_ids, $site_columns);
$slices= $api->GetSlices( $slice_ids, array( "slice_id", "name" ) );
$keys= $api->GetKeys( $key_ids );

drupal_set_title("Details for account " . $first_name . " " . $last_name);
$local_peer = ! $peer_id;

$peers = new Peers ($api);

if (count($site_ids))
    $site_id = $site_ids[0];
$is_my_account = plc_my_person_id() == $person_id;
$privileges = plc_is_admin () || ( plc_in_site($site_ids[0]) && plc_is_pi());

$tabs=array();

// enable / disable
// become
if (plc_is_admin() && ! $is_my_account && $local_peer && $enabled) 
  $tabs['Become'] = array('method'=>'POST',
			  'url'=>l_actions(),
			  'values'=>array('action'=>'become-person',
					  'person_id'=>$person_id),
			  'bubble'=>"Become $first_name $last_name",
			  'confirm'=>"Are you sure you want to become $first_name $last_name");
    
if ($local_peer && $privileges && ! $is_my_account) 
  if ($enabled) 
    $tabs['Disable'] = array ('method'=>'POST',
			      'url'=>l_actions(),
			      'values'=> array ('person_id'=>$person_id,
						'action'=>'disable-person'),
			      'bubble'=>"Disable $first_name $last_name",
			      'confirm'=>"Are you sure you want to disable $first_name $last_name");
  else 
    $tabs['Enable'] = array ('method'=>'POST',
			     'url'=>l_actions(),
			     'values'=> array ('person_id'=>$person_id,
					       'action'=>'enable-person'),
			     'bubble'=>"Enable $first_name $last_name",
			     'confirm'=>"Are you sure you want to enable $first_name $last_name");

// delete
if ($local_peer && $privileges && $local_peer && ! $is_my_account) 
  $tabs['Delete'] = array ('method'=>'POST',
			   'url'=>l_actions(),
			   'values'=> array ('person_id'=>$person_id,
					     'action'=>'delete-person'),
			   'bubble'=>"Delete $first_name $last_name",
			   'confirm'=>"Are you sure to delete $first_name $last_name");
// events for that person
if ( $privileges) 
  $tabs['Events'] = array('url'=>l_events(),
			  'values'=>array('type'=>'Person','person'=>$person_id),
			  'bubble'=>"Events about $first_name $last_name",
			  'image'=>'/planetlab/icons/event.png','height'=>18);

plekit_linetabs($tabs);
    
$peers->block_start ($peer_id);

if ($local_peer && $privileges && ! $enabled ) 
  drupal_set_message ("$first_name $last_name is not enabled yet, you can enable her/him with the 'Enable' button below");

$enabled_label="Yes";
if ( ! $enabled ) $enabled_label = plc_warning_html("Disabled");

$can_update = (plc_is_admin() && $local_peer) || $is_my_account;

$toggle = new PlekitToggle ('person',"Details",
			    array('bubble'=>'Display and modify details for that account',
				  'visible'=>get_arg('show_details')));
$toggle->start();

$details = new PlekitDetails($can_update);

$details->form_start(l_actions(),array("action"=>"update-person",
				       "person_id"=>$person_id));
$details->start();


$details->th_td("Title",$title,"title",array('width'=>10));
$details->th_td("First Name",$first_name,"first_name");
$details->th_td("Last Name",$last_name,"last_name");
$details->th_td(href("mailto:$email","Email"),$email,"email",array("width"=>30));
if ($hrn) $details->th_td("SFA hrn",$hrn);
else $details->tr("SFA hrn not set","center");
$details->th_td("Phone",$phone,"phone");
$details->th_td("URL",$url,"url",array('width'=>40));
$details->th_td("Bio",$bio,"bio",array('input_type'=>'textarea','height'=>4));

// xxx need to check that this is working
if ($can_update) {
  $details->th_td("Password","","password1",array('input_type'=>'password'));
  $details->th_td("Repeat","","password2",array('input_type'=>'password'));
  $details->tr_submit("submit","Update Account");
  $details->space();
 }

$details->th_td("Enabled",$enabled_label);
if ( ! $local_peer ) {
  $details->th_td("Peer",$peers->peer_link($peer_id));
  $details->space();
 }

$details->end();
$details->form_end();
$toggle->end();

//////////////////// slices
if ($local_peer) {
  $slices_title=count_english_warning($slices,'slice');
  $toggle=new PlekitToggle ('slices',$slices_title,
			    array('visible'=>get_arg('show_slices')));
  $toggle->start();
  
  if( ! $slices) {
    plc_warning ("User has no slice");
  } else {
    $headers=array('Slice name'=>'string');
    $reasonable_page=5;
    $table_options = array('notes_area'=>false,"search_width"=>10,'pagesize'=>$reasonable_page);
    if (count ($slices) <= $reasonable_page) {
      $table_options['search_area']=false;
      $table_options['pagesize_area']=false;
    }
    $table=new PlekitTable ("person_slices",$headers,1,$table_options);
    $table->start();
    
    foreach( $slices as $slice ) {
      $slice_name= $slice['name'];
      $slice_id= $slice['slice_id'];
      $table->row_start();
      $table->cell(l_slice_t($slice_id,$slice_name));
      $table->row_end();
    }
    $table->end();
  }
  $toggle->end();
 }

////////////////////////////////////////
// we don't set 'action', but use the submit button name instead
$form=new PlekitForm(l_actions(), array("person_id"=>$person_id));
$form->start();

//////////////////// keys
if ($local_peer) {
  $keys_title = count_english_warning($keys,'key');
  $toggle=new PlekitToggle ('keys',$keys_title,array('visible'=>get_arg('show_keys')));
  $toggle->start();
		
  $can_manage_keys = ( $local_peer && ( plc_is_admin() || $is_my_account) );
  if ( empty( $key_ids ) ) {
    plc_warning("This user has no known key");
  } 

  $headers=array("Type"=>"string",
		 "Key"=>"string");
  if ($can_manage_keys) $headers[plc_delete_icon()]="none";
  // table overall options
  $table_options=array('search_area'=>false,'pagesize_area'=>false,'notes_area'=>false);
  $table=new PlekitTable("person_keys",$headers,"1",$table_options);
  $table->start();
    
  if ($keys) foreach ($keys as $key) {
      $key_id=$key['key_id'];
      $table->row_start();
      $table->cell ($key['key_type']);
      $table->cell(wordwrap( $key['key'], 60, "<br />\n", 1 ));
      if ($can_manage_keys) 
	$table->cell ($form->checkbox_html('key_ids[]',$key_id));
      $table->row_end();
    }
  // the footer area is used for displaying key-management buttons
  // add the 'remove keys' button and key upload areas as the table footer
  if ($can_manage_keys) {
    $table->tfoot_start();
    // no need to remove if there's no key
    if ($keys) {
      $table->row_start();
      $table->cell($form->submit_html ("delete-keys","Remove keys"),
		   array('hfill'=>true,'align'=>'right'));
      $table->row_end();
    }
    $table->row_start();
    $table->cell($form->label_html("key","Upload new key")
		 . $form->file_html("key","upload",array('size'=>60))
		 . $form->submit_html("upload-key","Upload key"),
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();
  }

  $table->end();
  $toggle->end();
 }

//////////////////// sites
if ($local_peer) {
  $sites_title = count_english_warning($sites,'site');
  $toggle=new PlekitToggle('sites',$sites_title,
			   array('visible'=>get_arg('show_sites')));
  $toggle->start();
  
  if (empty( $sites ) ) {
    plc_warning('This user is not affiliated with a site !!');
  } 
  $can_manage_sites = $local_peer && plc_is_admin() || $is_my_account;
  $headers=array();
  $headers['Login_base']="string";
  $headers['Name']="string";
  if ($can_manage_sites) $headers[plc_delete_icon()]="none";
  $table_options = array('notes_area'=>false,'search_area'=>false, 'pagesize_area'=>false);
  $table=new PlekitTable ("person_sites",$headers,0,$table_options);
  $table->start();
  foreach( $sites as $site ) {
    $site_name= $site['name'];
    $site_id= $site['site_id'];
    $login_base=$site['login_base'];
    $table->row_start();
    $table->cell ($login_base);
    $table->cell (l_site_t($site_id,$site_name));
    if ($can_manage_sites)
      $table->cell ($form->checkbox_html('site_ids[]',$site_id));
    $table->row_end ();
  }
  if ($can_manage_sites) {
    $table->tfoot_start();

    if ($sites) {
      $table->row_start();
      $table->cell($form->submit_html("remove-person-from-sites","Remove Sites"),
		   array('hfill'=>true,'align'=>'right'));
      $table->row_end();
    }

    if (plc_is_admin()) 
    {
        // NOTE: only admins can add users to different sites.
        $table->row_start();
        // get list of local sites that the person is not in
        function get_site_id ($site) { return $site['site_id'];}
        $person_site_ids=array_map("get_site_id",$sites);
        $relevant_sites= $api->GetSites( array("peer_id"=>NULL,"~site_id"=>$person_site_ids, '-SORT'=>'name'), $site_columns);
        // xxx cannot use onchange=submit() - would need to somehow pass action name 
        function site_selector($site) { return array('display'=>$site['name'],"value"=>$site['site_id']); }
        $selectors = array_map ("site_selector",$relevant_sites);
        $table->cell ($form->select_html("site_id",$selectors,array('label'=>"Choose a site to add")).
              $form->submit_html("add-person-to-site","Add in site"),
              array('hfill'=>true,'align'=>'right'));
        $table->row_end();
    }
  }
  $table->end();
  $toggle->end();
 }
//////////////////// roles
if ($local_peer) {
  $toggle=new PlekitToggle ('roles',count_english($roles,"role"),array('visible'=>get_arg('show_roles')));
  $toggle->start();

  if (! $roles) plc_warning ("This user has no role !");

  $is_pi_of_the_site = ( plc_in_site($site_ids[0]) && plc_is_pi() );
  $can_manage_roles= ( ($local_peer && plc_is_admin()) || $is_pi_of_the_site );

  $headers=array("Role"=>"string");
  if ($can_manage_roles) $headers [plc_delete_icon()]="none";

  $table_options=array('search_area'=>false,'pagesize_area'=>false,'notes_area'=>false);
  $table=new PlekitTable("person_roles",$headers,0,$table_options);  
  $table->start();
  
  // construct array of role objs
  $role_objs=array();
  for ($n=0; $n<count($roles); $n++) {
    $role_objs[]= array('role_id'=>$role_ids[$n], 'name'=>$roles[$n]);
  }

  if ($role_objs) foreach ($role_objs as $role_obj) {
      $table->row_start();
      $table->cell($role_obj['name']);
      if ($can_manage_roles) $table->cell ($form->checkbox_html('role_ids[]',$role_obj['role_id']));
      $table->row_end();
    }

  // footers : the remove and add buttons
  if ($can_manage_roles) {

    // remove
    $table->tfoot_start();
    if ($roles) {
      $table->row_start();
      $table->cell($form->submit_html("remove-roles-from-person","Remove Roles"),
		   array('hfill'=>true,'align'=>'right'));
      $table->row_end();
    }

    // add
    // compute the roles that can be added
    if (plc_is_admin()) 
      // all roles, except 'node' that does not make sense for a person
      $exclude_role_ids=array(50);
    else
    // all roles except admin and pi, and node to avoid confusing people
      $exclude_role_ids=array(10,20,50);
    $possible_roles = roles_except($api->GetRoles(),$exclude_role_ids);
    $roles_to_add = roles_except ($possible_roles,$role_ids);
    if ( $roles_to_add ) {
      $selectors=$form->role_selectors($roles_to_add);
      $table->row_start();
      $add_role_left_area=$form->select_html("role_id",$selectors,array('label'=>"Choose role"));
      // add a role : the button
      $add_role_right_area=$form->submit_html("add-role-to-person","Add role");
      $table->cell ($add_role_left_area . $add_role_right_area,
		    array('hfill'=>true,'align'=>'right'));
      $table->row_end();
    }
  }
  $table->end();
  $toggle->end();
 }

//////////////////////////////////////////////////////////// Tags
// tags section
if ($local_peer) {
  $tags=$api->GetPersonTags (array('person_id'=>$person_id));
  function get_tagname ($tag) { return $tag['tagname'];}
  // xxx looks like tech-only see an error here, 
  // might be that GetPersonTags is not accessible or something
  $tagnames = array_map ("get_tagname",$tags);
  
  $toggle = new PlekitToggle ('tags',count_english($tags,'tag'),
			      array('bubble'=>'Inspect and set tags on that person',
				    'visible'=>get_arg('show_tags')));
  $toggle->start();

  $headers=array("Name"=>"string",
		 "Value"=>"string",
		 );
  if (plc_is_admin()) $headers[plc_delete_icon()]="none";
  
  $table_options=array("notes_area"=>false,"pagesize_area"=>false,"search_width"=>10);
  $table=new PlekitTable("person_tags",$headers,0,$table_options);
  $table->start();
  if ($tags) foreach ($tags as $tag) {
      $table->row_start();
      $table->cell(l_tag_obj($tag));
      $table->cell($tag['value']);
      // the remove checkbox
      if (plc_is_admin()) $table->cell ($form->checkbox_html('person_tag_ids[]',$tag['person_tag_id']));
      $table->row_end();
    }
  
  if ($privileges) {
    $table->tfoot_start();

    // remove tag 
    $table->row_start();
    $table->cell($form->submit_html("delete-person-tags","Remove Tags"),
		 // use the whole columns and right adjust
		 array('hfill'=>true,'align'=>'right'));
    $table->row_end();

    // set tag area
    $table->row_start();
    // get list of tag names in the person/* category    
    $all_tags= $api->GetTagTypes( array ("category"=>"person*","-SORT"=>"tagname"), array("tagname","tag_type_id"));
    // xxx cannot use onchange=submit() - would need to somehow pass action name 
    function tag_selector ($tag) { return array("display"=>$tag['tagname'],"value"=>$tag['tag_type_id']); }
    $selector=array_map("tag_selector",$all_tags);
    $table->cell($form->select_html("tag_type_id",$selector,array('label'=>"Choose")));
    $table->cell($form->text_html("value","",array('width'=>8)));
    $table->cell($form->submit_html("set-tag-on-person","Set Tag"),array('columns'=>2,'align'=>'left'));
    $table->row_end();
  }
  
  $table->end();
  $toggle->end();

}

//////////////////////////////
$form->end();
$peers->block_end($peer_id);
  
//plekit_linetabs ($tabs,"bottom");

// Print footer
include 'plc_footer.php';

?>
