<?php

// Require login
require_once 'plc_login.php';

// Get session and API handles
require_once 'plc_session.php';
global $plc, $api;

/*
// Print header
require_once 'plc_drupal.php';
drupal_set_title('Slices');
include 'plc_header.php';
*/

// Common functions
require_once 'plc_functions.php';

// find person roles
$_person= $plc->person;
$_roles= $_person['role_ids'];


drupal_set_message ("xxx tag_action.php is deprecated - use planetlab/actions.php instead");
return;


// TAGS -------------------------------------------------

// tag deletion
if( $_GET['rem_id'] ) {
  // get the id of the tag to remove from GET
  $tag_id= intval( $_GET['rem_id'] );

  // get slice_id 
  $tag_info= $api->GetSliceTags( array( $tag_id ), array( "slice_id" ) );
  $slice_id= $tag_info[0]['slice_id'];
  
  // delete the tag
  $api->DeleteSliceTag( $tag_id );

  plc_redirect( "index.php?id=$slice_id" );
}


// tag updates
if( $_POST['edit_tag'] ) {
  // get the id of the tag to update and the value from POST
  $tag_id= intval( $_POST['tag_id'] );
  $value= $_POST['value'];
  $slice_id= $_POST['slice_id'];

  // update it!
  $api->UpdateSliceTag( $tag_id, $value );

  plc_redirect( "index.php?id=$slice_id" );
}


// tag adds
if( $_POST['add_tag'] ) {
  // get the slice_id, tag_type_id, and value from POST
  $slice_id= intval( $_POST['slice_id'] );
  $tag_type_id= intval( $_POST['tag_type_id'] );
  $value= $_POST['value'];

  // add it!
  $api->AddSliceTag( $slice_id, $tag_type_id, $value );

  plc_redirect( "index.php?id=$slice_id" );
}

// TAG TYPES ---------------------------------------------------
  
// tag type adds
if( $_POST['add_type'] ) {
  // get post vars 
  $name= $_POST['name'];
  $min_role_id= intval( $_POST['min_role_id'] );
  $description= $_POST['description'];
  
  // make the tag_type_fields dict
  // xxx misses category
  $tag_type_fields= array( "min_role_id" => $min_role_id, 
			   "tagname" => $name, 
			   "description" => $description );
  
  // add it!!
  $api->AddTagType( $tag_type_fields );

  plc_redirect( "tags.php?type=slice" );
}
  

// tag type updates
if( $_POST['edit_type'] ) {
  // get post vars 
  $name= $_POST['name'];
  $min_role_id= intval( $_POST['min_role_id'] );
  $description= $_POST['description'];  
  $tag_type_id= intval( $_POST['tag_type_id'] );
  
  // make tag_type_fields dict
  $tag_type_fields= array( "min_role_id" => $min_role_id, "tagname" => $name, "description" => $description );

  // Update it!
  $api->UpdateTagType( $tag_type_id, $tag_type_fields );
  
  plc_redirect( "tags.php?type=slice" );
}


/*
// Print footer
include 'plc_footer.php';
*/

?>
