<?php
//
// part of yum config on nodes
//
// Thierry Parmentelat 
// Copyright (C) 2008 INRIA
//

// For PLC_NAME and PLC_BOOT_HOST
include('plc_config.php');

$PLC_NAME = PLC_NAME;
$PLC_BOOT_HOST = PLC_BOOT_HOST;

// Get admin API handle
require_once 'plc_api.php';
global $adm;

if (isset($_REQUEST['gpgcheck'])) {
  $gpgcheck = $_REQUEST['gpgcheck'];
} else {
  $gpgcheck = 0;
}

echo "# Generated by yum.php\n";
# we assume the node is not so old that it would not send node_id
# get node family
if ( ! isset($_REQUEST['node_id'])) {
  echo "# yum.php expects node_id to be set\n";
  echo "# looks like you're running a very old NodeManager...\n";
  echo "# bailing out..\n";
  exit;
 }
$node_id = intval($_REQUEST['node_id']);
$nodeflavour=$adm->GetNodeFlavour($node_id);
$fcdistro=$nodeflavour['fcdistro'];

if ( ! isset($_REQUEST['path'])) {
  echo "# yum.php expect path to be set - bailing out\n";
  exit;
 }
$path = $_REQUEST['path'];

# try to open /var/www/html/yum/<fcdistro>/<path>
$fc_name="/var/www/html/yum/" . $fcdistro . "/" . $path;

$fc_contents=file_get_contents($fc_name);
if ($fc_contents) {
  echo "#\n";
  echo "# yum.php has retrieved " . $fc_name . "\n";
  echo "#\n";
  print $fc_contents;
  exit;
 }
echo "#\n";
echo "# yum.php could not find the following path\n";
echo "# " . $fc_name . "\n";
echo "# bailing out\n";



