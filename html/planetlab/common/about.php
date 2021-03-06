<?php
// $Id$
//
// Get session and API handles
require_once 'plc_session.php';
global $plc, $api, $adm;

// Print header
require_once 'plc_drupal.php';
drupal_set_title('About myplc');
include 'plc_header.php';

// Common functions
require_once 'plc_functions.php';

/*
function __cmp_lower ($a,$b) {
  return strcmp(strtolower($a),strtolower($b));
}
*/

$release=$adm->GetPlcRelease ();

//print "<table><tbody>\n";

print "MyPLC is a complete Ceni Central installation used to run a Ceni network of nodes. The default installation consists of a web server, an XML-RPC API server, a boot server, and a database server: the core components of PLC. The installation may be customized through a graphical interface. All PLC services are started up and shut down through a single System V init script installed in the host system.";
/*
foreach ( array( "build", "tags", "rpms" ) as $field) {

  print "<tr><th colspan='2' align='center'></th></tr>\n";
  print "<tr><th colspan='2' align='center'><h2>" . ucwords($field . " details") . "</h2></th></tr>\n";
  $keys=array_keys($release[$field]);
  usort($keys,"__cmp_lower");

  foreach ($keys as $key) {
    print "<tr><th align='right'>" . $key . "</th>";
    print "<td class='plc-foreign'>"  . $release[$field][$key] . "</td></tr>";
  }
}
*/

//print '</tbody></table>';
  
include 'plc_footer.php';


