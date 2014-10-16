<?php
require_once 'plc_drupal.php';
drupal_set_title("PLC API Documentation (lxc)");
?>
<DIV
CLASS="BOOK"
><A
NAME="AEN1"
></A
><DIV
CLASS="TITLEPAGE"
><H1
CLASS="title"
><A
NAME="AEN2"
>Ceni Central API Documentation</A
></H1
><HR></DIV
><DIV
CLASS="TOC"
><DL
><DT
><B
>Table of Contents</B
></DT
><DT
><A
HREF="#Introduction"
>Introduction</A
></DT
><DD
><DL
><DT
><A
HREF="#Authentication"
>Authentication</A
></DT
><DT
><A
HREF="#Roles"
>Roles</A
></DT
><DT
><A
HREF="#Filters"
>Filters</A
></DT
><DD
><DL
><DT
><A
HREF="#pattern-matching"
>Pattern Matching</A
></DT
><DT
><A
HREF="#negation"
>Negation</A
></DT
><DT
><A
HREF="#numeric"
>Numeric comparisons</A
></DT
><DT
><A
HREF="#sequence"
>Filtering on a sequence field</A
></DT
><DT
><A
HREF="#sort-clip"
>Sorting and Clipping</A
></DT
></DL
></DD
><DT
><A
HREF="#and-or"
>All criteria / Any criteria</A
></DT
><DT
><A
HREF="#tags"
>Tags</A
></DT
><DD
><DL
><DT
><A
HREF="#tags-low-level"
>Low level</A
></DT
><DT
><A
HREF="#accessors"
>Accessors</A
></DT
><DT
><A
HREF="#expose-in-api"
>Through regular Add/Get/Update methods</A
></DT
></DL
></DD
><DT
><A
HREF="#nodegroups"
>Nodegroups</A
></DT
><DT
><A
HREF="#plcsh"
>Ceni shell</A
></DT
><DT
><A
HREF="#standalone"
>Using regular python</A
></DT
></DL
></DD
><DT
><A
HREF="#Methods"
>Ceni API Methods</A
></DT
><DD
><DL
><DT
><A
HREF="#AddAddressType"
>AddAddressType</A
></DT
><DT
><A
HREF="#AddAddressTypeToAddress"
>AddAddressTypeToAddress</A
></DT
><DT
><A
HREF="#AddBootState"
>AddBootState</A
></DT
><DT
><A
HREF="#AddConfFile"
>AddConfFile</A
></DT
><DT
><A
HREF="#AddConfFileToNode"
>AddConfFileToNode</A
></DT
><DT
><A
HREF="#AddConfFileToNodeGroup"
>AddConfFileToNodeGroup</A
></DT
><DT
><A
HREF="#AddIlink"
>AddIlink</A
></DT
><DT
><A
HREF="#AddInitScript"
>AddInitScript</A
></DT
><DT
><A
HREF="#AddInterface"
>AddInterface</A
></DT
><DT
><A
HREF="#AddInterfaceTag"
>AddInterfaceTag</A
></DT
><DT
><A
HREF="#AddKeyType"
>AddKeyType</A
></DT
><DT
><A
HREF="#AddLeases"
>AddLeases</A
></DT
><DT
><A
HREF="#AddMessage"
>AddMessage</A
></DT
><DT
><A
HREF="#AddNetworkMethod"
>AddNetworkMethod</A
></DT
><DT
><A
HREF="#AddNetworkType"
>AddNetworkType</A
></DT
><DT
><A
HREF="#AddNode"
>AddNode</A
></DT
><DT
><A
HREF="#AddNodeGroup"
>AddNodeGroup</A
></DT
><DT
><A
HREF="#AddNodeTag"
>AddNodeTag</A
></DT
><DT
><A
HREF="#AddNodeToPCU"
>AddNodeToPCU</A
></DT
><DT
><A
HREF="#AddNodeType"
>AddNodeType</A
></DT
><DT
><A
HREF="#AddPCU"
>AddPCU</A
></DT
><DT
><A
HREF="#AddPCUProtocolType"
>AddPCUProtocolType</A
></DT
><DT
><A
HREF="#AddPCUType"
>AddPCUType</A
></DT
><DT
><A
HREF="#AddPeer"
>AddPeer</A
></DT
><DT
><A
HREF="#AddPerson"
>AddPerson</A
></DT
><DT
><A
HREF="#AddPersonKey"
>AddPersonKey</A
></DT
><DT
><A
HREF="#AddPersonTag"
>AddPersonTag</A
></DT
><DT
><A
HREF="#AddPersonToSite"
>AddPersonToSite</A
></DT
><DT
><A
HREF="#AddPersonToSlice"
>AddPersonToSlice</A
></DT
><DT
><A
HREF="#AddRole"
>AddRole</A
></DT
><DT
><A
HREF="#AddRoleToPerson"
>AddRoleToPerson</A
></DT
><DT
><A
HREF="#AddRoleToTagType"
>AddRoleToTagType</A
></DT
><DT
><A
HREF="#AddSession"
>AddSession</A
></DT
><DT
><A
HREF="#AddSite"
>AddSite</A
></DT
><DT
><A
HREF="#AddSiteAddress"
>AddSiteAddress</A
></DT
><DT
><A
HREF="#AddSiteTag"
>AddSiteTag</A
></DT
><DT
><A
HREF="#AddSlice"
>AddSlice</A
></DT
><DT
><A
HREF="#AddSliceInstantiation"
>AddSliceInstantiation</A
></DT
><DT
><A
HREF="#AddSliceTag"
>AddSliceTag</A
></DT
><DT
><A
HREF="#AddSliceToNodes"
>AddSliceToNodes</A
></DT
><DT
><A
HREF="#AddSliceToNodesWhitelist"
>AddSliceToNodesWhitelist</A
></DT
><DT
><A
HREF="#AddTagType"
>AddTagType</A
></DT
><DT
><A
HREF="#AuthCheck"
>AuthCheck</A
></DT
><DT
><A
HREF="#BindObjectToPeer"
>BindObjectToPeer</A
></DT
><DT
><A
HREF="#BlacklistKey"
>BlacklistKey</A
></DT
><DT
><A
HREF="#BootGetNodeDetails"
>BootGetNodeDetails</A
></DT
><DT
><A
HREF="#BootNotifyOwners"
>BootNotifyOwners</A
></DT
><DT
><A
HREF="#BootUpdateNode"
>BootUpdateNode</A
></DT
><DT
><A
HREF="#DeleteAddress"
>DeleteAddress</A
></DT
><DT
><A
HREF="#DeleteAddressType"
>DeleteAddressType</A
></DT
><DT
><A
HREF="#DeleteAddressTypeFromAddress"
>DeleteAddressTypeFromAddress</A
></DT
><DT
><A
HREF="#DeleteBootState"
>DeleteBootState</A
></DT
><DT
><A
HREF="#DeleteConfFile"
>DeleteConfFile</A
></DT
><DT
><A
HREF="#DeleteConfFileFromNode"
>DeleteConfFileFromNode</A
></DT
><DT
><A
HREF="#DeleteConfFileFromNodeGroup"
>DeleteConfFileFromNodeGroup</A
></DT
><DT
><A
HREF="#DeleteIlink"
>DeleteIlink</A
></DT
><DT
><A
HREF="#DeleteInitScript"
>DeleteInitScript</A
></DT
><DT
><A
HREF="#DeleteInterface"
>DeleteInterface</A
></DT
><DT
><A
HREF="#DeleteInterfaceTag"
>DeleteInterfaceTag</A
></DT
><DT
><A
HREF="#DeleteKey"
>DeleteKey</A
></DT
><DT
><A
HREF="#DeleteKeyType"
>DeleteKeyType</A
></DT
><DT
><A
HREF="#DeleteLeases"
>DeleteLeases</A
></DT
><DT
><A
HREF="#DeleteMessage"
>DeleteMessage</A
></DT
><DT
><A
HREF="#DeleteNetworkMethod"
>DeleteNetworkMethod</A
></DT
><DT
><A
HREF="#DeleteNetworkType"
>DeleteNetworkType</A
></DT
><DT
><A
HREF="#DeleteNode"
>DeleteNode</A
></DT
><DT
><A
HREF="#DeleteNodeFromPCU"
>DeleteNodeFromPCU</A
></DT
><DT
><A
HREF="#DeleteNodeGroup"
>DeleteNodeGroup</A
></DT
><DT
><A
HREF="#DeleteNodeTag"
>DeleteNodeTag</A
></DT
><DT
><A
HREF="#DeleteNodeType"
>DeleteNodeType</A
></DT
><DT
><A
HREF="#DeletePCU"
>DeletePCU</A
></DT
><DT
><A
HREF="#DeletePCUProtocolType"
>DeletePCUProtocolType</A
></DT
><DT
><A
HREF="#DeletePCUType"
>DeletePCUType</A
></DT
><DT
><A
HREF="#DeletePeer"
>DeletePeer</A
></DT
><DT
><A
HREF="#DeletePerson"
>DeletePerson</A
></DT
><DT
><A
HREF="#DeletePersonFromSite"
>DeletePersonFromSite</A
></DT
><DT
><A
HREF="#DeletePersonFromSlice"
>DeletePersonFromSlice</A
></DT
><DT
><A
HREF="#DeletePersonTag"
>DeletePersonTag</A
></DT
><DT
><A
HREF="#DeleteRole"
>DeleteRole</A
></DT
><DT
><A
HREF="#DeleteRoleFromPerson"
>DeleteRoleFromPerson</A
></DT
><DT
><A
HREF="#DeleteRoleFromTagType"
>DeleteRoleFromTagType</A
></DT
><DT
><A
HREF="#DeleteSession"
>DeleteSession</A
></DT
><DT
><A
HREF="#DeleteSite"
>DeleteSite</A
></DT
><DT
><A
HREF="#DeleteSiteTag"
>DeleteSiteTag</A
></DT
><DT
><A
HREF="#DeleteSlice"
>DeleteSlice</A
></DT
><DT
><A
HREF="#DeleteSliceFromNodes"
>DeleteSliceFromNodes</A
></DT
><DT
><A
HREF="#DeleteSliceFromNodesWhitelist"
>DeleteSliceFromNodesWhitelist</A
></DT
><DT
><A
HREF="#DeleteSliceInstantiation"
>DeleteSliceInstantiation</A
></DT
><DT
><A
HREF="#DeleteSliceTag"
>DeleteSliceTag</A
></DT
><DT
><A
HREF="#DeleteTagType"
>DeleteTagType</A
></DT
><DT
><A
HREF="#GenerateNodeConfFile"
>GenerateNodeConfFile</A
></DT
><DT
><A
HREF="#GetAddressTypes"
>GetAddressTypes</A
></DT
><DT
><A
HREF="#GetAddresses"
>GetAddresses</A
></DT
><DT
><A
HREF="#GetBootMedium"
>GetBootMedium</A
></DT
><DT
><A
HREF="#GetBootStates"
>GetBootStates</A
></DT
><DT
><A
HREF="#GetConfFiles"
>GetConfFiles</A
></DT
><DT
><A
HREF="#GetEventObjects"
>GetEventObjects</A
></DT
><DT
><A
HREF="#GetEvents"
>GetEvents</A
></DT
><DT
><A
HREF="#GetIlinks"
>GetIlinks</A
></DT
><DT
><A
HREF="#GetInitScripts"
>GetInitScripts</A
></DT
><DT
><A
HREF="#GetInterfaceAlias"
>GetInterfaceAlias</A
></DT
><DT
><A
HREF="#GetInterfaceBackdoor"
>GetInterfaceBackdoor</A
></DT
><DT
><A
HREF="#GetInterfaceChannel"
>GetInterfaceChannel</A
></DT
><DT
><A
HREF="#GetInterfaceDriver"
>GetInterfaceDriver</A
></DT
><DT
><A
HREF="#GetInterfaceEssid"
>GetInterfaceEssid</A
></DT
><DT
><A
HREF="#GetInterfaceFreq"
>GetInterfaceFreq</A
></DT
><DT
><A
HREF="#GetInterfaceIfname"
>GetInterfaceIfname</A
></DT
><DT
><A
HREF="#GetInterfaceIwconfig"
>GetInterfaceIwconfig</A
></DT
><DT
><A
HREF="#GetInterfaceIwpriv"
>GetInterfaceIwpriv</A
></DT
><DT
><A
HREF="#GetInterfaceKey"
>GetInterfaceKey</A
></DT
><DT
><A
HREF="#GetInterfaceKey1"
>GetInterfaceKey1</A
></DT
><DT
><A
HREF="#GetInterfaceKey2"
>GetInterfaceKey2</A
></DT
><DT
><A
HREF="#GetInterfaceKey3"
>GetInterfaceKey3</A
></DT
><DT
><A
HREF="#GetInterfaceKey4"
>GetInterfaceKey4</A
></DT
><DT
><A
HREF="#GetInterfaceMode"
>GetInterfaceMode</A
></DT
><DT
><A
HREF="#GetInterfaceNw"
>GetInterfaceNw</A
></DT
><DT
><A
HREF="#GetInterfaceRate"
>GetInterfaceRate</A
></DT
><DT
><A
HREF="#GetInterfaceSecurityMode"
>GetInterfaceSecurityMode</A
></DT
><DT
><A
HREF="#GetInterfaceSens"
>GetInterfaceSens</A
></DT
><DT
><A
HREF="#GetInterfaceTags"
>GetInterfaceTags</A
></DT
><DT
><A
HREF="#GetInterfaces"
>GetInterfaces</A
></DT
><DT
><A
HREF="#GetKeyTypes"
>GetKeyTypes</A
></DT
><DT
><A
HREF="#GetKeys"
>GetKeys</A
></DT
><DT
><A
HREF="#GetLeaseGranularity"
>GetLeaseGranularity</A
></DT
><DT
><A
HREF="#GetLeases"
>GetLeases</A
></DT
><DT
><A
HREF="#GetMessages"
>GetMessages</A
></DT
><DT
><A
HREF="#GetNetworkMethods"
>GetNetworkMethods</A
></DT
><DT
><A
HREF="#GetNetworkTypes"
>GetNetworkTypes</A
></DT
><DT
><A
HREF="#GetNodeArch"
>GetNodeArch</A
></DT
><DT
><A
HREF="#GetNodeCramfs"
>GetNodeCramfs</A
></DT
><DT
><A
HREF="#GetNodeDeployment"
>GetNodeDeployment</A
></DT
><DT
><A
HREF="#GetNodeExtensions"
>GetNodeExtensions</A
></DT
><DT
><A
HREF="#GetNodeFcdistro"
>GetNodeFcdistro</A
></DT
><DT
><A
HREF="#GetNodeFlavour"
>GetNodeFlavour</A
></DT
><DT
><A
HREF="#GetNodeGroups"
>GetNodeGroups</A
></DT
><DT
><A
HREF="#GetNodeHrn"
>GetNodeHrn</A
></DT
><DT
><A
HREF="#GetNodeKargs"
>GetNodeKargs</A
></DT
><DT
><A
HREF="#GetNodeKvariant"
>GetNodeKvariant</A
></DT
><DT
><A
HREF="#GetNodeNoHangcheck"
>GetNodeNoHangcheck</A
></DT
><DT
><A
HREF="#GetNodePlainBootstrapfs"
>GetNodePlainBootstrapfs</A
></DT
><DT
><A
HREF="#GetNodePldistro"
>GetNodePldistro</A
></DT
><DT
><A
HREF="#GetNodeSerial"
>GetNodeSerial</A
></DT
><DT
><A
HREF="#GetNodeTags"
>GetNodeTags</A
></DT
><DT
><A
HREF="#GetNodeTypes"
>GetNodeTypes</A
></DT
><DT
><A
HREF="#GetNodeVirt"
>GetNodeVirt</A
></DT
><DT
><A
HREF="#GetNodes"
>GetNodes</A
></DT
><DT
><A
HREF="#GetPCUProtocolTypes"
>GetPCUProtocolTypes</A
></DT
><DT
><A
HREF="#GetPCUTypes"
>GetPCUTypes</A
></DT
><DT
><A
HREF="#GetPCUs"
>GetPCUs</A
></DT
><DT
><A
HREF="#GetPeerData"
>GetPeerData</A
></DT
><DT
><A
HREF="#GetPeerName"
>GetPeerName</A
></DT
><DT
><A
HREF="#GetPeers"
>GetPeers</A
></DT
><DT
><A
HREF="#GetPersonAdvanced"
>GetPersonAdvanced</A
></DT
><DT
><A
HREF="#GetPersonColumnconf"
>GetPersonColumnconf</A
></DT
><DT
><A
HREF="#GetPersonHrn"
>GetPersonHrn</A
></DT
><DT
><A
HREF="#GetPersonShowconf"
>GetPersonShowconf</A
></DT
><DT
><A
HREF="#GetPersonTags"
>GetPersonTags</A
></DT
><DT
><A
HREF="#GetPersons"
>GetPersons</A
></DT
><DT
><A
HREF="#GetPlcRelease"
>GetPlcRelease</A
></DT
><DT
><A
HREF="#GetRoles"
>GetRoles</A
></DT
><DT
><A
HREF="#GetSession"
>GetSession</A
></DT
><DT
><A
HREF="#GetSessions"
>GetSessions</A
></DT
><DT
><A
HREF="#GetSiteTags"
>GetSiteTags</A
></DT
><DT
><A
HREF="#GetSites"
>GetSites</A
></DT
><DT
><A
HREF="#GetSliceArch"
>GetSliceArch</A
></DT
><DT
><A
HREF="#GetSliceFamily"
>GetSliceFamily</A
></DT
><DT
><A
HREF="#GetSliceFcdistro"
>GetSliceFcdistro</A
></DT
><DT
><A
HREF="#GetSliceHmac"
>GetSliceHmac</A
></DT
><DT
><A
HREF="#GetSliceHrn"
>GetSliceHrn</A
></DT
><DT
><A
HREF="#GetSliceInitscript"
>GetSliceInitscript</A
></DT
><DT
><A
HREF="#GetSliceInitscriptCode"
>GetSliceInitscriptCode</A
></DT
><DT
><A
HREF="#GetSliceInstantiations"
>GetSliceInstantiations</A
></DT
><DT
><A
HREF="#GetSliceKeys"
>GetSliceKeys</A
></DT
><DT
><A
HREF="#GetSliceOmfControl"
>GetSliceOmfControl</A
></DT
><DT
><A
HREF="#GetSlicePldistro"
>GetSlicePldistro</A
></DT
><DT
><A
HREF="#GetSliceSliverHMAC"
>GetSliceSliverHMAC</A
></DT
><DT
><A
HREF="#GetSliceSshKey"
>GetSliceSshKey</A
></DT
><DT
><A
HREF="#GetSliceTags"
>GetSliceTags</A
></DT
><DT
><A
HREF="#GetSliceTicket"
>GetSliceTicket</A
></DT
><DT
><A
HREF="#GetSliceVref"
>GetSliceVref</A
></DT
><DT
><A
HREF="#GetSlices"
>GetSlices</A
></DT
><DT
><A
HREF="#GetSlivers"
>GetSlivers</A
></DT
><DT
><A
HREF="#GetTagTypes"
>GetTagTypes</A
></DT
><DT
><A
HREF="#GetWhitelist"
>GetWhitelist</A
></DT
><DT
><A
HREF="#NotifyPersons"
>NotifyPersons</A
></DT
><DT
><A
HREF="#NotifySupport"
>NotifySupport</A
></DT
><DT
><A
HREF="#RebootNode"
>RebootNode</A
></DT
><DT
><A
HREF="#RebootNodeWithPCU"
>RebootNodeWithPCU</A
></DT
><DT
><A
HREF="#RefreshPeer"
>RefreshPeer</A
></DT
><DT
><A
HREF="#ReportRunlevel"
>ReportRunlevel</A
></DT
><DT
><A
HREF="#ResetPassword"
>ResetPassword</A
></DT
><DT
><A
HREF="#ResolveSlices"
>ResolveSlices</A
></DT
><DT
><A
HREF="#RetrieveSlicePersonKeys"
>RetrieveSlicePersonKeys</A
></DT
><DT
><A
HREF="#RetrieveSliceSliverKeys"
>RetrieveSliceSliverKeys</A
></DT
><DT
><A
HREF="#SetInterfaceAlias"
>SetInterfaceAlias</A
></DT
><DT
><A
HREF="#SetInterfaceBackdoor"
>SetInterfaceBackdoor</A
></DT
><DT
><A
HREF="#SetInterfaceChannel"
>SetInterfaceChannel</A
></DT
><DT
><A
HREF="#SetInterfaceDriver"
>SetInterfaceDriver</A
></DT
><DT
><A
HREF="#SetInterfaceEssid"
>SetInterfaceEssid</A
></DT
><DT
><A
HREF="#SetInterfaceFreq"
>SetInterfaceFreq</A
></DT
><DT
><A
HREF="#SetInterfaceIfname"
>SetInterfaceIfname</A
></DT
><DT
><A
HREF="#SetInterfaceIwconfig"
>SetInterfaceIwconfig</A
></DT
><DT
><A
HREF="#SetInterfaceIwpriv"
>SetInterfaceIwpriv</A
></DT
><DT
><A
HREF="#SetInterfaceKey"
>SetInterfaceKey</A
></DT
><DT
><A
HREF="#SetInterfaceKey1"
>SetInterfaceKey1</A
></DT
><DT
><A
HREF="#SetInterfaceKey2"
>SetInterfaceKey2</A
></DT
><DT
><A
HREF="#SetInterfaceKey3"
>SetInterfaceKey3</A
></DT
><DT
><A
HREF="#SetInterfaceKey4"
>SetInterfaceKey4</A
></DT
><DT
><A
HREF="#SetInterfaceMode"
>SetInterfaceMode</A
></DT
><DT
><A
HREF="#SetInterfaceNw"
>SetInterfaceNw</A
></DT
><DT
><A
HREF="#SetInterfaceRate"
>SetInterfaceRate</A
></DT
><DT
><A
HREF="#SetInterfaceSecurityMode"
>SetInterfaceSecurityMode</A
></DT
><DT
><A
HREF="#SetInterfaceSens"
>SetInterfaceSens</A
></DT
><DT
><A
HREF="#SetNodeArch"
>SetNodeArch</A
></DT
><DT
><A
HREF="#SetNodeCramfs"
>SetNodeCramfs</A
></DT
><DT
><A
HREF="#SetNodeDeployment"
>SetNodeDeployment</A
></DT
><DT
><A
HREF="#SetNodeExtensions"
>SetNodeExtensions</A
></DT
><DT
><A
HREF="#SetNodeFcdistro"
>SetNodeFcdistro</A
></DT
><DT
><A
HREF="#SetNodeHrn"
>SetNodeHrn</A
></DT
><DT
><A
HREF="#SetNodeKargs"
>SetNodeKargs</A
></DT
><DT
><A
HREF="#SetNodeKvariant"
>SetNodeKvariant</A
></DT
><DT
><A
HREF="#SetNodeNoHangcheck"
>SetNodeNoHangcheck</A
></DT
><DT
><A
HREF="#SetNodePlainBootstrapfs"
>SetNodePlainBootstrapfs</A
></DT
><DT
><A
HREF="#SetNodePldistro"
>SetNodePldistro</A
></DT
><DT
><A
HREF="#SetNodeSerial"
>SetNodeSerial</A
></DT
><DT
><A
HREF="#SetNodeVirt"
>SetNodeVirt</A
></DT
><DT
><A
HREF="#SetPersonAdvanced"
>SetPersonAdvanced</A
></DT
><DT
><A
HREF="#SetPersonColumnconf"
>SetPersonColumnconf</A
></DT
><DT
><A
HREF="#SetPersonHrn"
>SetPersonHrn</A
></DT
><DT
><A
HREF="#SetPersonPrimarySite"
>SetPersonPrimarySite</A
></DT
><DT
><A
HREF="#SetPersonShowconf"
>SetPersonShowconf</A
></DT
><DT
><A
HREF="#SetSliceArch"
>SetSliceArch</A
></DT
><DT
><A
HREF="#SetSliceFcdistro"
>SetSliceFcdistro</A
></DT
><DT
><A
HREF="#SetSliceHmac"
>SetSliceHmac</A
></DT
><DT
><A
HREF="#SetSliceHrn"
>SetSliceHrn</A
></DT
><DT
><A
HREF="#SetSliceInitscript"
>SetSliceInitscript</A
></DT
><DT
><A
HREF="#SetSliceInitscriptCode"
>SetSliceInitscriptCode</A
></DT
><DT
><A
HREF="#SetSliceOmfControl"
>SetSliceOmfControl</A
></DT
><DT
><A
HREF="#SetSlicePldistro"
>SetSlicePldistro</A
></DT
><DT
><A
HREF="#SetSliceSliverHMAC"
>SetSliceSliverHMAC</A
></DT
><DT
><A
HREF="#SetSliceSshKey"
>SetSliceSshKey</A
></DT
><DT
><A
HREF="#SetSliceVref"
>SetSliceVref</A
></DT
><DT
><A
HREF="#UnBindObjectFromPeer"
>UnBindObjectFromPeer</A
></DT
><DT
><A
HREF="#UpdateAddress"
>UpdateAddress</A
></DT
><DT
><A
HREF="#UpdateAddressType"
>UpdateAddressType</A
></DT
><DT
><A
HREF="#UpdateConfFile"
>UpdateConfFile</A
></DT
><DT
><A
HREF="#UpdateIlink"
>UpdateIlink</A
></DT
><DT
><A
HREF="#UpdateInitScript"
>UpdateInitScript</A
></DT
><DT
><A
HREF="#UpdateInterface"
>UpdateInterface</A
></DT
><DT
><A
HREF="#UpdateInterfaceTag"
>UpdateInterfaceTag</A
></DT
><DT
><A
HREF="#UpdateKey"
>UpdateKey</A
></DT
><DT
><A
HREF="#UpdateLeases"
>UpdateLeases</A
></DT
><DT
><A
HREF="#UpdateMessage"
>UpdateMessage</A
></DT
><DT
><A
HREF="#UpdateNode"
>UpdateNode</A
></DT
><DT
><A
HREF="#UpdateNodeGroup"
>UpdateNodeGroup</A
></DT
><DT
><A
HREF="#UpdateNodeTag"
>UpdateNodeTag</A
></DT
><DT
><A
HREF="#UpdatePCU"
>UpdatePCU</A
></DT
><DT
><A
HREF="#UpdatePCUProtocolType"
>UpdatePCUProtocolType</A
></DT
><DT
><A
HREF="#UpdatePCUType"
>UpdatePCUType</A
></DT
><DT
><A
HREF="#UpdatePeer"
>UpdatePeer</A
></DT
><DT
><A
HREF="#UpdatePerson"
>UpdatePerson</A
></DT
><DT
><A
HREF="#UpdatePersonTag"
>UpdatePersonTag</A
></DT
><DT
><A
HREF="#UpdateSite"
>UpdateSite</A
></DT
><DT
><A
HREF="#UpdateSiteTag"
>UpdateSiteTag</A
></DT
><DT
><A
HREF="#UpdateSlice"
>UpdateSlice</A
></DT
><DT
><A
HREF="#UpdateSliceTag"
>UpdateSliceTag</A
></DT
><DT
><A
HREF="#UpdateTagType"
>UpdateTagType</A
></DT
><DT
><A
HREF="#VerifyPerson"
>VerifyPerson</A
></DT
><DT
><A
HREF="#system.listMethods"
>system.listMethods</A
></DT
><DT
><A
HREF="#system.methodHelp"
>system.methodHelp</A
></DT
><DT
><A
HREF="#system.methodSignature"
>system.methodSignature</A
></DT
><DT
><A
HREF="#system.multicall"
>system.multicall</A
></DT
></DL
></DD
></DL
></DIV
><DIV
CLASS="chapter"
><HR><H1
><A
NAME="Introduction"
></A
>Introduction</H1
><P
>The Ceni Central API (PLCAPI) is the interface through
    which the Ceni Central database should be accessed and
    maintained. The API is used by the website, by nodes, by automated
    scripts, and by users to access and update information about
    users, nodes, sites, slices, and other entities maintained by the
    database.</P
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Authentication"
>Authentication</A
></H2
><P
>The API should be accessed via XML-RPC over HTTPS. The API
      supports the standard introspection calls <A
HREF="#system.listMethods"
>system.listMethods</A
>, <A
HREF="#system.methodSignature"
>system.methodSignature</A
>,
      and <A
HREF="#system.methodHelp"
>system.methodHelp</A
>,
      and the standard batching call <A
HREF="#system.multicall"
>system.multicall</A
>. With the
      exception of these calls, all PLCAPI calls take an
      authentication structure as their first argument. All
      authentication structures require the specification of
      <TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>. If the documentation for a
      call does not further specify the authentication structure, then
      any of (but only) the following authentication structures may be
      used:</P
><P
></P
><UL
><LI
><P
>Session authentication. User sessions are typically
	  valid for 24 hours. Node sessions are valid until the next
	  reboot. Obtain a session key with <A
HREF="#GetSession"
>GetSession</A
> using another form of
	  authentication, such as password or GnuPG
	  authentication.</P
><DIV
CLASS="informaltable"
><P
></P
><A
NAME="AEN19"
></A
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
CELLSPACING="0"
CELLPADDING="4"
CLASS="CALSTABLE"
><TBODY
><TR
><TD
>AuthMethod</TD
><TD
><TT
CLASS="literal"
>session</TT
></TD
><TD
>&nbsp;</TD
></TR
><TR
><TD
>session</TD
><TD
>Session key</TD
><TD
>&nbsp;</TD
></TR
></TBODY
></TABLE
><P
></P
></DIV
></LI
><LI
><P
>Password authentication.</P
><DIV
CLASS="informaltable"
><P
></P
><A
NAME="AEN31"
></A
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
CELLSPACING="0"
CELLPADDING="4"
CLASS="CALSTABLE"
><TBODY
><TR
><TD
>AuthMethod</TD
><TD
><TT
CLASS="literal"
>password</TT
></TD
><TD
>&nbsp;</TD
></TR
><TR
><TD
>Username</TD
><TD
>Username, typically an e-mail address</TD
><TD
>&nbsp;</TD
></TR
><TR
><TD
>AuthString</TD
><TD
>Authentication string, typically a password</TD
><TD
>&nbsp;</TD
></TR
></TBODY
></TABLE
><P
></P
></DIV
></LI
><LI
><P
>GnuPG authentication. Users may upload a GPG public key
	  using <A
HREF="#AddPersonKey"
>AddPersonKey</A
>. Peer
	  GPG keys should be added with <A
HREF="#AddPeer"
>AddPeer</A
> or <A
HREF="#UpdatePeer"
>UpdatePeer</A
>.
	  </P
><DIV
CLASS="informaltable"
><P
></P
><A
NAME="AEN49"
></A
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
CELLSPACING="0"
CELLPADDING="4"
CLASS="CALSTABLE"
><TBODY
><TR
><TD
>AuthMethod</TD
><TD
><TT
CLASS="literal"
>gpg</TT
></TD
><TD
>&nbsp;</TD
></TR
><TR
><TD
>name</TD
><TD
>Peer or user name</TD
><TD
>&nbsp;</TD
></TR
><TR
><TD
>signature</TD
><TD
>GnuPG signature of
		the <A
HREF="http://www.w3.org/TR/xml-c14n"
TARGET="_top"
>canonicalized</A
>
		<A
HREF="http://www.xmlrpc.com/spec"
TARGET="_top"
>XML-RPC</A
>
		representation of the rest of the arguments to the
		call.</TD
><TD
>&nbsp;</TD
></TR
></TBODY
></TABLE
><P
></P
></DIV
></LI
><LI
><P
>Anonymous authentication.</P
><DIV
CLASS="informaltable"
><P
></P
><A
NAME="AEN66"
></A
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
CELLSPACING="0"
CELLPADDING="4"
CLASS="CALSTABLE"
><TBODY
><TR
><TD
>AuthMethod</TD
><TD
><TT
CLASS="literal"
>anonymous</TT
></TD
><TD
>&nbsp;</TD
></TR
></TBODY
></TABLE
><P
></P
></DIV
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Roles"
>Roles</A
></H2
><P
>Some functions may only be called by users with certain
      roles (see <A
HREF="#GetRoles"
>GetRoles</A
>), and others
      may return different information to different callers depending
      on the role(s) of the caller.</P
><P
>The <TT
CLASS="literal"
>node</TT
> and
      <TT
CLASS="literal"
>anonymous</TT
> roles are pseudo-roles. A function
      that allows the <TT
CLASS="literal"
>node</TT
> role may be called by
      automated scripts running on a node, such as the Boot and Node
      Managers. A function that allows the
      <TT
CLASS="literal"
>anonymous</TT
> role may be called by anyone; an
      API authentication structure must still be specified (see <A
HREF="#Authentication"
>the Section called <I
>Authentication</I
></A
>).</P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="Filters"
>Filters</A
></H2
><P
>Most of the <TT
CLASS="function"
>Get</TT
> methods take a
      filter argument. Filters may be arrays of integer (and sometimes
      string) identifiers, or a struct representing a filter on the
      attributes of the entities being queried. For example,

<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;&#62;&#62;&#62; GetNodes([1,2,3])
&#62;&#62;&#62; GetNodes({'node_id': [1,2,3]})
</PRE
></TD
></TR
></TABLE
>
</P
><P
>Would be equivalent queries. Attributes that are
      themselves arrays (such as <TT
CLASS="literal"
>interface_ids</TT
>
      and <TT
CLASS="literal"
>slice_ids</TT
> for nodes) cannot be used in
      filters.</P
><P
> Filters support a few extra features illustrated in the following examples.</P
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="pattern-matching"
>Pattern Matching</A
></H3
><P
> <TT
CLASS="literal"
>*</TT
> can be used in a text value and have the usual meaning, so all nodes in the <I
CLASS="emphasis"
>fr</I
> can be obtained with:
	  <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>GetNodes ( { 'hostname' : '*.fr' } ) </PRE
></TD
></TR
></TABLE
>
	</P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="negation"
>Negation</A
></H3
><P
> Fields starting with a <TT
CLASS="literal"
>~</TT
> are negated, so non-local nodes can be fetched with:
	<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>GetNodes( { '~peer_id' : None } ) </PRE
></TD
></TR
></TABLE
>
	</P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="numeric"
>Numeric comparisons</A
></H3
><P
> Strictly greater/smaller operations are achieved by prepending the field name like in:
	<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>GetEvents( { '&#62;time' : 1178531418 } ) </PRE
></TD
></TR
></TABLE
>
	</P
><P
> Greater/smaller or equal: 
	<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>GetEvents( { ']event_id' : 2305 } ) </PRE
></TD
></TR
></TABLE
>
	</P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="sequence"
>Filtering on a sequence field</A
></H3
><P
> A field starting with '&#38;' or '|' should refer to a sequence type;
      the semantics is then that the object's value (expected to be a list)
      should contain all (&#38;) or any (|) value specified in the corresponding
      filter value. 
      <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetPersons ( { '|role_ids' : [ 20, 40 ] } ) </PRE
></TD
></TR
></TABLE
>
      <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetPersons ( { '|roles' : ['tech', 'pi'] } ) </PRE
></TD
></TR
></TABLE
>
      <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetPersons ( { '&#38;roles' : ['admin', 'tech'] } ) </PRE
></TD
></TR
></TABLE
>
      <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetPersons ( { '&#38;roles' : 'tech' } ) </PRE
></TD
></TR
></TABLE
>
	</P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="sort-clip"
>Sorting and Clipping</A
></H3
><P
> The following 3 special fields can be used to extract only a subset of the results for pagination:
	  <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetNodes( { '-SORT' : 'hostname' , '-OFFSET' : 30 , '-LIMIT' : 25 }</PRE
></TD
></TR
></TABLE
>
	</P
></DIV
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="and-or"
>All criteria / Any criteria</A
></H2
><P
> The default in the vast majority of the code is to select
      objects that match ALL the criteria specified in the struct. It
      is possible to search for objects that match ANY of these by
      adding the special '-OR' key (the value is then ignored), as in:
      <TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> GetPersons ( { '-OR' : 'anything', 'site_id':2, '&#38;roles':['admin'] } ) </PRE
></TD
></TR
></TABLE
>
      </P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="tags"
>Tags</A
></H2
><P
> The PLC API comes with a feature called
      <I
CLASS="emphasis"
>tags</I
>, that basically aims at supporting an
      extensible data model. A few classes (as of this writing, Nodes,
      Interfaces, Sites, Persons and Slices) are eligible for being dynamically
      extended beyond the basic set of fields that are built into the
      database schema.</P
><P
> Historically, this is a generalization of the concept of
      <I
CLASS="emphasis"
> SliceAttribute </I
>, and the more recent
      concept of <I
CLASS="emphasis"
> InterfaceSetting </I
>, that with
      release 5.0 have been renamed into <I
CLASS="emphasis"
> SliceTag
      </I
> and <I
CLASS="emphasis"
> InterfaceTag </I
>,
      respectively. </P
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="tags-low-level"
>Low level</A
></H3
><P
> The low level interface to tags relies on the following items:
      <P
></P
><UL
><LI
><P
> 
	  A <I
CLASS="emphasis"
> TagType </I
> object basically models a
	  new column that needs to be added to other objects. In much
	  the same way as nodes are named through a <I
CLASS="emphasis"
>&#13;	  hostname </I
>, tagtypes are named with a
	  <I
CLASS="emphasis"
>tagname</I
>, plus additional information
	  (<I
CLASS="emphasis"
>category</I
>,
	  <I
CLASS="emphasis"
>description</I
>).  
	</P
></LI
><LI
><P
>&#13;	  <I
CLASS="emphasis"
>description</I
> is mostly informative, it
	    is used by the web interface to provide more details on
	    the meaning of that tag. 
	</P
></LI
><LI
><P
>&#13;	  <I
CLASS="emphasis"
>category</I
> is used in a variety of ways,
	  in the web interface again.  Over time this has become a
	  means to attach various information to a tag type, so it is
	  used as some sort of a poorman's tag tag system :).
	 </P
></LI
><LI
><P
>&#13;	   The convention is to set in category a set of slash-separated
	   fields, like the following real examples demonstrate.
<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
> 
&#62;&#62;&#62; tagnames=['arch','fcdistro','hrn','hmac','exempt_node_until']
&#62;&#62;&#62; for tt in GetTagTypes(tagnames,['tagname','category']): 
&#62;&#62;&#62; ... print "tagname=%-18s category=%s"%(tt['tagname'], tt['category'])
tagname=hrn                category=node/sfa
tagname=hmac               category=slice/auth	 
tagname=exempt_node_until  category=node/myops
tagname=fcdistro           category=node/slice/config/ui/header=f/rank=w
tagname=arch               category=node/slice/config/ui/header=A/rank=x
</PRE
></TD
></TR
></TABLE
>
	 </P
></LI
><LI
><P
> <I
CLASS="emphasis"
>roles</I
> may also be
	attached to a given tag_type (use AddRoleToTagType or
	DeleteRoleFromTagType). This is an evolution over the former
	system based on so-called 'min_role_id', and now any set of
	roles may be mentioned. More importantly, each type (Node,
	Person, ...) implements its own policy to let or not non-admin
	callers change their tags. For example in the current
	implementation, non-admin users can only change their own
	person tags. See PLC/AuthorizeHelpers.py for that code.
	</P
></LI
><LI
><P
> The low-level method for managaing tags is then, once
	  the TagType is known to the system, to attach a value to,
	  say, a Node, by calling <I
CLASS="emphasis"
> AddNodeTag </I
>,
	  and then as usual change this value with <I
CLASS="emphasis"
>&#13;	  UpdateNodeTag </I
>, or delete it with <I
CLASS="emphasis"
>&#13;	  DeleteNodeTag </I
>. </P
></LI
></UL
>
    </P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="accessors"
>Accessors</A
></H3
><P
> A rather more convenient way to use tags is through
      Accessors. This convenience is located in <I
CLASS="emphasis"
>&#13;      PLC/Accessors </I
>, and allows you to easily define Get
      or Set methods dedicated to a given tag. This is for instance
      how the <I
CLASS="emphasis"
> GetNodeArch </I
> and <I
CLASS="emphasis"
>&#13;      SetNodeArch </I
> methods are implemented. These methods
      greatly simplify tags manipulation as they take care of
      <P
></P
><UL
><LI
><P
> Creating and enforcing <I
CLASS="emphasis"
> TagTypes
	  </I
>; each time you restart your plc, the tag_types
	  mentioned in accessor definitions are created and checked
	  (in terms of the category, description and roles defined in
	  the various calls to define_accessors).</P
></LI
><LI
><P
> Create or update the, say, <I
CLASS="emphasis"
> NodeTag
	  </I
> object, as needed.</P
></LI
><LI
><P
> In addition, an accessor definition mentions
	<I
CLASS="emphasis"
> get_roles </I
> (defaults to all_roles), and
	<I
CLASS="emphasis"
>set_roles </I
>. These values are used as
	follows. <I
CLASS="emphasis"
> get_roles </I
> is attached to the
	Get accessor, so callers that do not have this role cannot run
	the Get accessor. <I
CLASS="emphasis"
> set_roles </I
> is attached
	to the Set accessor, as well as to the corresponding TagType,
	which in turn is used for checking write access to the tag
	type. </P
></LI
></UL
>
    </P
><P
> <I
CLASS="emphasis"
> Site-specific </I
> accessors can be
      defined in <I
CLASS="emphasis"
>&#13;      /usr/share/plc_api/PLC/Accessors/Accessors_site.py </I
>
      and will be preserved across updates of the
      <I
CLASS="emphasis"
>plcapi</I
> rpm.
      </P
><P
> 
	The accessors mechanism does not currently support setting slice
	tags that apply only on a given node or nodegroup. 
      </P
></DIV
><DIV
CLASS="section"
><HR><H3
CLASS="section"
><A
NAME="expose-in-api"
>Through regular Add/Get/Update methods</A
></H3
><P
> 
	Finally, tags may also get manipulated through the
	<I
CLASS="emphasis"
>AddNode</I
>, <I
CLASS="emphasis"
>GetNodes</I
>,
	and <I
CLASS="emphasis"
>UpdateNode</I
> methods:

      <P
></P
><UL
><LI
><P
> 
	  The <TT
CLASS="literal"
>define_accessors</TT
> function in the
	  Accessors factory has an optional argument named <TT
CLASS="literal"
>&#13;	  expose_in_api </TT
>. When this is set, the
	  corresponding tag becomes visible from the Add/Get/Update
	  methods almost as if it was a native tag.
	</P
></LI
><LI
><P
>&#13;	  So for instance the following code would be legal and do as expected:
<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;# create a x86_64 node
&#62;&#62;&#62; AddNode({'hostname':'pl1.foo.com','arch':'x86_64'})
# get details for pl1.foo.com including tag 'arch' tag
&#62;&#62;&#62; GetNodes(['pl1.foo.com'],['boot_state','node_type','arch'])
# set the 'deployment' tag
&#62;&#62;&#62; UpdateNode('pl1.foo.com',{'deployment':'beta'})
# get all alpha and beta nodes
&#62;&#62;&#62; GetNodes({'deployment':'*a'},['hostname','deployment'])
</PRE
></TD
></TR
></TABLE
>
	</P
></LI
><LI
><P
> 
	  The current limitations about tags, as opposed to native
	  fields, is that for performance, tags won't get returned
	  when using the implicit set of columns. So for instance:
<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;# get all details for 'pl1.foo.com' 
&#62;&#62;&#62; node=GetNodes(['pl1.foo.com'])[0]
# this did not return the 'arch' tag
&#62;&#62;&#62; 'arch' in node
False
</PRE
></TD
></TR
></TABLE
>
	</P
></LI
><LI
><P
>&#13;	  For a similar reason, any tag used in the filter argument will <I
CLASS="emphasis"
>have to</I
> be mentioned in the list of returned columns as well. For example:
<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;# if 'hrn' is not part of the result, this does not work
&#62;&#62;&#62; ns=GetNodes({'hrn':'ple.*'},['hostname'])
Database error b59e068c-589a-4ad5-9dd8-63cc38f2a2eb:
column "hrn" does not exist
LINE 1: ...M view_nodes WHERE deleted IS False AND (True AND hrn ILIKE ...
... abridged ...
# this can be worked around by just returning 'hrn' as well
&#62;&#62;&#62; ns=GetNodes({'hrn':'ple.*'},['hrn','hostname'])
</PRE
></TD
></TR
></TABLE
>
	</P
></LI
></UL
>
    </P
></DIV
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="nodegroups"
>Nodegroups</A
></H2
><P
> In earlier versions up to v4.2, <I
CLASS="emphasis"
> NodeGroups
    </I
> used to be defined extensively. So you would,
    basically, create an empty nodegroup instance, and then use
    <I
CLASS="emphasis"
> AddNodeToNodeGroup </I
> or <I
CLASS="emphasis"
>&#13;    DeleteNodeFromNodeGroup </I
> to manage the nodegroup's
    contents. </P
><P
> The new model has been redefined as follows. You now define
    a nodegroup as the set of nodes for which a given <I
CLASS="emphasis"
> Tag
    </I
> has a given value, which are defined once and for good
    when creating the <I
CLASS="emphasis"
> NodeGroup </I
> object. </P
><P
> So for instance for managing the set of nodes that are
    running various levels of software code, PLC has defined two
    <I
CLASS="emphasis"
> NodeGroups </I
> named <TT
CLASS="literal"
> alpha </TT
>
    and <TT
CLASS="literal"
> beta </TT
>. With the new model, we would now do
    something like the following, using the built-in <TT
CLASS="literal"
>&#13;    deployment </TT
> tag that is created for that purpose:
<TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;### creating node groups
&#62;&#62;&#62; AddNodeGroup('alphanodes','deployment','alpha')
21
&#62;&#62;&#62; AddNodeGroup('betanodes','deployment','beta')
22
### checking contents (no node has 'deployment' set to either 'alpha' or 'beta' yet)
&#62;&#62;&#62; for ng in GetNodeGroups(['alphanodes','betanodes'],['groupname','node_ids']): print ng
{'groupname': u'alphanodes', 'node_ids': []}
{'groupname': u'betanodes', 'node_ids': []}

### displaying node ids 
&#62;&#62;&#62; for n in GetNodes({'hostname':'*.inria.fr'},['hostname','node_id']): print n
{'hostname': u'vnode01.inria.fr', 'node_id': 1}
{'hostname': u'vnode02.inria.fr', 'node_id': 2}

### setting 'deployment' for these two nodes
&#62;&#62;&#62; SetNodeDeployment('vnode01.inria.fr','alpha')
&#62;&#62;&#62; for ng in GetNodeGroups(['alphanodes','betanodes'],['groupname','node_ids']): print ng
{'groupname': u'alphanodes', 'node_ids': [1]}
{'groupname': u'betanodes', 'node_ids': []}
&#62;&#62;&#62; SetNodeDeployment('vnode02.inria.fr','beta')

### checking contents again
&#62;&#62;&#62; for ng in GetNodeGroups(['alphanodes','betanodes'],['groupname','node_ids']): print ng
{'groupname': u'alphanodes', 'node_ids': [1]}
{'groupname': u'betanodes', 'node_ids': [2]}
</PRE
></TD
></TR
></TABLE
>
</P
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="plcsh"
>Ceni shell</A
></H2
><P
>A command-line program called <B
CLASS="command"
>plcsh</B
>
      simplifies authentication structure handling, and is useful for
      scripting. This program is distributed as a Linux RPM called
      PLCAPI and requires Python &#8805;2.4.</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;usage: plcsh [options]

options:
  -f CONFIG, --config=CONFIG
                        PLC configuration file
  -h URL, --url=URL     API URL
  -c CACERT, --cacert=CACERT
                        API SSL certificate
  -k INSECURE, --insecure=INSECURE
                        Do not check SSL certificate
  -m METHOD, --method=METHOD
                        API authentication method
  -s SESSION, --session=SESSION
                        API session key
  -u USER, --user=USER  API user name
  -p PASSWORD, --password=PASSWORD
                        API password
  -r ROLE, --role=ROLE  API role
  -x, --xmlrpc          Use XML-RPC interface
  --help                show this help message and exit
      </PRE
></TD
></TR
></TABLE
><P
>Specify at least the API URL and your user name:</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;plcsh --url https://www.planet-lab.org/PLCAPI/ -u user@site.edu
      </PRE
></TD
></TR
></TABLE
><P
>You will be presented with a prompt. From here, you can
      invoke API calls and omit the authentication structure, as it will
      be filled in automatically.</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;user@site.edu connected using password authentication
Type "system.listMethods()" or "help(method)" for more information.
[user@site.edu]&#62;&#62;&#62; AuthCheck()
1
[user@site.edu]&#62;&#62;&#62; GetNodes([121], ['node_id', 'hostname'])
[{'node_id': 121, 'hostname': 'planetlab-1.cs.princeton.edu'}]
      </PRE
></TD
></TR
></TABLE
><P
>As this program is actually a Python interpreter, you may
      create variables, execute for loops, import other packages, etc.,
      directly on the command line as you would using the regular Python
      shell.</P
><P
>To use <B
CLASS="command"
>plcsh</B
> programmatically, import
      the <TT
CLASS="function"
>PLC.Shell</TT
> module:</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;#!/usr/bin/python

import sys

# Default location that the PLCAPI RPM installs the PLC class
sys.path.append('/usr/share/plc_api')

# Initialize shell environment. Shell() will define all PLCAPI methods
# in the specified namespace (specifying globals() will define them
# globally).
from PLC.Shell import Shell
plc = Shell(globals(),
            url = "https://www.planet-lab.org/PLCAPI/",
            user = "user@site.edu",
            password = "password")

# Both are equivalent
nodes = GetNodes([121], ['node_id', 'hostname'])
nodes = plc.GetNodes([121], ['node_id', 'hostname'])
      </PRE
></TD
></TR
></TABLE
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="standalone"
>Using regular python</A
></H2
><P
>It is also possible to write simple regular-python scripts,
    as illustrated in the example below. The only difference with the
    examples above is that all API calls need to be passed a first
    argument for authentication. This example would write in a file
    the name of all the hosts attached to a given slice.</P
><TABLE
BORDER="0"
BGCOLOR="#E0E0E0"
WIDTH="100%"
><TR
><TD
><PRE
CLASS="programlisting"
>&#13;#!/usr/bin/env python

import xmlrpclib

plc_host='www.planet-lab.eu'

slice_name='inria_heartbeat'

auth = { 'AuthMethod' : 'password',
         'Username' : 'thierry.parmentelat@inria.fr',
         'AuthString' : 'xxxxxx',
}

api_url="https://%s:443/PLCAPI/"%plc_host

plc_api = xmlrpclib.ServerProxy(api_url,allow_none=True)

# the slice's node ids
node_ids = plc_api.GetSlices(auth,slice_name,['node_ids'])[0]['node_ids']

# get hostname for these nodes
slice_nodes = plc_api.GetNodes(auth,node_ids,['hostname'])

# store in a file
f=open('mynodes.txt','w')
for node in slice_nodes:
    print &#62;&#62;f,node['hostname']
f.close()
</PRE
></TD
></TR
></TABLE
></DIV
></DIV
><DIV
CLASS="chapter"
><HR><H1
><A
NAME="Methods"
></A
>Ceni API Methods</H1
><P
></P
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddAddressType"
>AddAddressType</A
></H2
><P
>Prototype:<A
NAME="AEN245"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddAddressType (auth, address_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN248"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new address type. Fields specified in address_type_fields
are used.</P
><P
>Returns the new address_type_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN252"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Address type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Address type description					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New address_type_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddAddressTypeToAddress"
>AddAddressTypeToAddress</A
></H2
><P
>Prototype:<A
NAME="AEN280"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddAddressTypeToAddress (auth, address_type_id_or_name, address_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN283"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds an address type to the specified address.</P
><P
>PIs may only update addresses of their own sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN288"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier					</P
></LI
><LI
><P
>&#13;string, Address type					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int, Address identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddBootState"
>AddBootState</A
></H2
><P
>Prototype:<A
NAME="AEN317"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddBootState (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN320"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new node boot state.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN324"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Boot state			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddConfFile"
>AddConfFile</A
></H2
><P
>Prototype:<A
NAME="AEN345"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddConfFile (auth, conf_file_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN348"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new node configuration file. Any fields specified in
conf_file_fields are used, otherwise defaults are used.</P
><P
>Returns the new conf_file_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN352"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_owner</I
></TT
>
: string, chown(1) owner					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postinstall_cmd</I
></TT
>
: string, Shell command to execute after installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>error_cmd</I
></TT
>
: string, Shell command to execute if any error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>preinstall_cmd</I
></TT
>
: string, Shell command to execute prior to installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dest</I
></TT
>
: string, Absolute path where file should be installed					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ignore_cmd_errors</I
></TT
>
: boolean, Install file anyway even if an error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Configuration file is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_permissions</I
></TT
>
: string, chmod(1) permissions					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>source</I
></TT
>
: string, Relative path on the boot server where file can be downloaded					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>always_update</I
></TT
>
: boolean, Always attempt to install file even if unchanged					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_group</I
></TT
>
: string, chgrp(1) owner					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New conf_file_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddConfFileToNode"
>AddConfFileToNode</A
></H2
><P
>Prototype:<A
NAME="AEN407"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddConfFileToNode (auth, conf_file_id, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN410"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a configuration file to the specified node. If the node is
already linked to the configuration file, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN414"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddConfFileToNodeGroup"
>AddConfFileToNodeGroup</A
></H2
><P
>Prototype:<A
NAME="AEN443"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddConfFileToNodeGroup (auth, conf_file_id, nodegroup_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN446"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a configuration file to the specified node group. If the node
group is already linked to the configuration file, no errors are
returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN450"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier					</P
></LI
><LI
><P
>&#13;string, Node group name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddIlink"
>AddIlink</A
></H2
><P
>Prototype:<A
NAME="AEN479"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddIlink (auth, src_if_id, dst_if_id, tag_type_id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN482"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Create a link between two interfaces
The link has a tag type, that needs be created beforehand
and an optional value.</P
><P
>Returns the new ilink_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN486"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>src_if_id</I
></TT
>
: int, source interface identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>dst_if_id</I
></TT
>
: int, destination interface identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, optional ilink value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New ilink_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddInitScript"
>AddInitScript</A
></H2
><P
>Prototype:<A
NAME="AEN521"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddInitScript (auth, initscript_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN524"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new initscript. Any fields specified in initscript_fields
are used, otherwise defaults are used.</P
><P
>Returns the new initscript_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN528"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>initscript_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Initscript is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Initscript name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>script</I
></TT
>
: string, Initscript					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New initscript_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddInterface"
>AddInterface</A
></H2
><P
>Prototype:<A
NAME="AEN559"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddInterface (auth, node_id_or_hostname, interface_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN562"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new network for a node. Any values specified in
interface_fields are used, otherwise defaults are
used.</P
><P
>If type is static, then ip, gateway, network, broadcast, netmask,
and dns1 must all be specified in interface_fields. If type is
dhcp, these parameters, even if specified, are ignored.</P
><P
>PIs and techs may only add interfaces to their own nodes. Admins may
add interfaces to any node.</P
><P
>Returns the new interface_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN568"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean, Is the primary interface for this node					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, (Optional) Hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array, List of interface settings					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int, Bandwidth limit					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ifname</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string, Address type (e.g., 'ipv4')					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New interface_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddInterfaceTag"
>AddInterfaceTag</A
></H2
><P
>Prototype:<A
NAME="AEN649"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddInterfaceTag (auth, interface_id, tag_type_id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN652"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sets the specified setting for the specified interface
to the specified value.</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns the new interface_tag_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN657"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Interface setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New interface_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddKeyType"
>AddKeyType</A
></H2
><P
>Prototype:<A
NAME="AEN689"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddKeyType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN692"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new key type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN696"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Key type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddLeases"
>AddLeases</A
></H2
><P
>Prototype:<A
NAME="AEN717"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddLeases (auth, node_id_or_hostname_s, slice_id_or_name, t_from, t_until)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN720"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new lease.
Mandatory arguments are node(s), slice, t_from and t_until
times can be either integers, datetime's, or human readable (see Timestamp)</P
><P
>PIs may only add leases associated with their own sites (i.e.,
to a slice that belongs to their site).
Users may only add leases associated with their own slices.</P
><P
>Returns the new lease_ids if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN725"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname_s</I
></TT
>
: int or array of int or string or array of string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;array of int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>t_from</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)					</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>t_until</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)					</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct,  'new_ids' is the list of newly created ids, 'errors' is a list of error strings			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddMessage"
>AddMessage</A
></H2
><P
>Prototype:<A
NAME="AEN779"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddMessage (auth, message_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN782"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new message template. Any values specified in
message_fields are used, otherwise defaults are used.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN786"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Message is enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string, Message identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>template</I
></TT
>
: string, Message template					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>subject</I
></TT
>
: string, Message summary					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNetworkMethod"
>AddNetworkMethod</A
></H2
><P
>Prototype:<A
NAME="AEN820"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNetworkMethod (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN823"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new network method.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN827"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Network method			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNetworkType"
>AddNetworkType</A
></H2
><P
>Prototype:<A
NAME="AEN848"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNetworkType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN851"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new network type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN855"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Network type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNode"
>AddNode</A
></H2
><P
>Prototype:<A
NAME="AEN876"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNode (auth, site_id_or_login_base, node_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN879"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new node. Any values specified in node_fields are used,
otherwise defaults are used.</P
><P
>PIs and techs may only add nodes to their own sites. Admins may
add nodes to any site.</P
><P
>Returns the new node_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN884"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fcdistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>virt</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string, Node type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string, Apparent Boot CD version					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>extensions</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pldistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>deployment</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, Make and model of the actual machine					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>arch</I
></TT
>
: string, accessor					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New node_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNodeGroup"
>AddNodeGroup</A
></H2
><P
>Prototype:<A
NAME="AEN950"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNodeGroup (auth, groupname, tag_type_id_or_tagname, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN953"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new node group. Any values specified in nodegroup_fields
are used, otherwise defaults are used.</P
><P
>Returns the new nodegroup_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN957"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>groupname</I
></TT
>
: string, Node group name			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_tagname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Node tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New nodegroup_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNodeTag"
>AddNodeTag</A
></H2
><P
>Prototype:<A
NAME="AEN989"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNodeTag (auth, node_id, tag_type_id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN992"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sets the specified tag for the specified node
to the specified value.</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns the new node_tag_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN997"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Node tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New node_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNodeToPCU"
>AddNodeToPCU</A
></H2
><P
>Prototype:<A
NAME="AEN1034"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNodeToPCU (auth, node_id_or_hostname, pcu_id, port)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1037"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a node to a port on a PCU. Faults if the node has already
been added to the PCU or if the port is already in use.</P
><P
>Non-admins may only update PCUs at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1042"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int, PCU identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>port</I
></TT
>
: int, PCU port number			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddNodeType"
>AddNodeType</A
></H2
><P
>Prototype:<A
NAME="AEN1074"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddNodeType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1077"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new node node type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1081"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Node type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPCU"
>AddPCU</A
></H2
><P
>Prototype:<A
NAME="AEN1102"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPCU (auth, site_id_or_login_base, pcu_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1105"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new power control unit (PCU) to the specified site. Any
fields specified in pcu_fields are used, otherwise defaults are
used.</P
><P
>PIs and technical contacts may only add PCUs to their own sites.</P
><P
>Returns the new pcu_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1110"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>username</I
></TT
>
: string, PCU username					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, PCU protocol, e.g. ssh, https, telnet					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, PCU IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>notes</I
></TT
>
: string, Miscellaneous notes					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, PCU hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model string					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, PCU username					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New pcu_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPCUProtocolType"
>AddPCUProtocolType</A
></H2
><P
>Prototype:<A
NAME="AEN1161"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPCUProtocolType (auth, pcu_type_id_or_model, protocol_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1164"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new pcu protocol type.</P
><P
>Returns the new pcu_protocol_type_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1168"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_id_or_model</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU Type Identifier					</P
></LI
><LI
><P
>&#13;string, PCU model					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>protocol_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>supported</I
></TT
>
: boolean, Is the port/protocol supported by PLC					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, Protocol					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>port</I
></TT
>
: int, PCU port					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU type identifier					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New pcu_protocol_type_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPCUType"
>AddPCUType</A
></H2
><P
>Prototype:<A
NAME="AEN1210"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPCUType (auth, pcu_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1213"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new pcu type.</P
><P
>Returns the new pcu_type_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1217"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, PCU full name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New pcu_type_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPeer"
>AddPeer</A
></H2
><P
>Prototype:<A
NAME="AEN1245"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPeer (auth, peer_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1248"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new peer.</P
><P
>Returns the new peer_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1252"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peername</I
></TT
>
: string, Peer name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_url</I
></TT
>
: string, Peer API URL					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Peer GPG public key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn_root</I
></TT
>
: string, Root of this peer in a hierarchical naming space					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>cacert</I
></TT
>
: string, Peer SSL public certificate					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string, Peer short name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New peer_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPerson"
>AddPerson</A
></H2
><P
>Prototype:<A
NAME="AEN1292"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPerson (auth, person_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1295"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new account. Any fields specified in person_fields are
used, otherwise defaults are used.</P
><P
>Accounts are disabled by default. To enable an account, use
UpdatePerson().</P
><P
>Returns the new person_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1300"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string, Biography					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string, Given name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string, Surname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string, Title					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, Home page					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string, Telephone number					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>showconf</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>columnconf</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, Account password in crypt() form					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string, Primary e-mail address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>advanced</I
></TT
>
: string, accessor					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New person_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPersonKey"
>AddPersonKey</A
></H2
><P
>Prototype:<A
NAME="AEN1358"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPersonKey (auth, person_id_or_email, key_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1361"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new key to the specified account.</P
><P
>Non-admins can only modify their own keys.</P
><P
>Returns the new key_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1366"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string, Key type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New key_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPersonTag"
>AddPersonTag</A
></H2
><P
>Prototype:<A
NAME="AEN1402"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPersonTag (auth, person_id, tag_type_id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1405"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sets the specified setting for the specified person
to the specified value.</P
><P
>Admins have full access.  Non-admins can change their own tags.</P
><P
>Returns the new person_tag_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1410"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, User identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Person setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New person_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPersonToSite"
>AddPersonToSite</A
></H2
><P
>Prototype:<A
NAME="AEN1442"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPersonToSite (auth, person_id_or_email, site_id_or_login_base)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1445"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds the specified person to the specified site. If the person is
already a member of the site, no errors are returned. Does not
change the person's primary site.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1449"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddPersonToSlice"
>AddPersonToSlice</A
></H2
><P
>Prototype:<A
NAME="AEN1483"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddPersonToSlice (auth, person_id_or_email, slice_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1486"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds the specified person to the specified slice. If the person is
already a member of the slice, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1490"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddRole"
>AddRole</A
></H2
><P
>Prototype:<A
NAME="AEN1524"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddRole (auth, role_id, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1527"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new role.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1531"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id</I
></TT
>
: int, Role identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Role			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddRoleToPerson"
>AddRoleToPerson</A
></H2
><P
>Prototype:<A
NAME="AEN1555"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddRoleToPerson (auth, role_id_or_name, person_id_or_email)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1558"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Grants the specified role to the person.</P
><P
>PIs can only grant the tech and user roles to users and techs at
their sites. Admins can grant any role to any user.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1563"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier					</P
></LI
><LI
><P
>&#13;string, Role					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddRoleToTagType"
>AddRoleToTagType</A
></H2
><P
>Prototype:<A
NAME="AEN1597"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddRoleToTagType (auth, role_id_or_name, tag_type_id_or_tagname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1600"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Add the specified role to the tagtype so that
users with that role can tweak the tag.</P
><P
>Only admins can call this method</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1605"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier					</P
></LI
><LI
><P
>&#13;string, Role					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_tagname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSession"
>AddSession</A
></H2
><P
>Prototype:<A
NAME="AEN1639"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSession (auth, person_id_or_email)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1642"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Creates and returns a new session key for the specified user.
(Used for website 'user sudo')</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1645"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Session key			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSite"
>AddSite</A
></H2
><P
>Prototype:<A
NAME="AEN1671"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSite (auth, site_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1674"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new site, and creates a node group for that site. Any
fields specified in site_fields are used, otherwise defaults are
used.</P
><P
>Returns the new site_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1678"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Full site name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL of a page that describes the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Has been enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>longitude</I
></TT
>
: double, Decimal longitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slivers</I
></TT
>
: int, Maximum number of slivers that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slices</I
></TT
>
: int, Maximum number of slices that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string, Site slice prefix					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ext_consortium_id</I
></TT
>
: int, external consortium id					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>latitude</I
></TT
>
: double, Decimal latitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_public</I
></TT
>
: boolean, Publicly viewable site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>abbreviated_name</I
></TT
>
: string, Abbreviated site name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New site_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSiteAddress"
>AddSiteAddress</A
></H2
><P
>Prototype:<A
NAME="AEN1733"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSiteAddress (auth, site_id_or_login_base, address_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1736"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new address to a site. Fields specified in
address_fields are used; some are not optional.</P
><P
>PIs may only add addresses to their own sites.</P
><P
>Returns the new address_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1741"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>city</I
></TT
>
: string, City					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>country</I
></TT
>
: string, Country					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line3</I
></TT
>
: string, Address line 3					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line2</I
></TT
>
: string, Address line 2					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line1</I
></TT
>
: string, Address line 1					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>state</I
></TT
>
: string, State or province					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postalcode</I
></TT
>
: string, Postal code					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New address_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSiteTag"
>AddSiteTag</A
></H2
><P
>Prototype:<A
NAME="AEN1792"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSiteTag (auth, site_id, tag_type_id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1795"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sets the specified setting for the specified site
to the specified value.</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns the new site_tag_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1800"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Site setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New site_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSlice"
>AddSlice</A
></H2
><P
>Prototype:<A
NAME="AEN1832"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSlice (auth, slice_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1835"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new slice. Any fields specified in slice_fields are used,
otherwise defaults are used.</P
><P
>Valid slice names are lowercase and begin with the login_base
(slice prefix) of a valid site, followed by a single
underscore. Thereafter, only letters, numbers, or additional
underscores may be used.</P
><P
>PIs may only add slices associated with their own sites (i.e.,
slice prefixes must always be the login_base of one of their
sites).</P
><P
>Returns the new slice_id (&#62; 0) if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1841"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string, Slice instantiation state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fcdistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Slice description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL further describing this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_nodes</I
></TT
>
: int, Maximum number of nodes that can be assigned to this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscript_code</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enable_hmac</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>omf_control</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pldistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscript</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>arch</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>vref</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New slice_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSliceInstantiation"
>AddSliceInstantiation</A
></H2
><P
>Prototype:<A
NAME="AEN1905"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSliceInstantiation (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1908"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new slice instantiation state.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1912"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice instantiation state			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSliceTag"
>AddSliceTag</A
></H2
><P
>Prototype:<A
NAME="AEN1933"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSliceTag (auth, slice_id_or_name, tag_type_id_or_name, value, node_id_or_hostname, nodegroup_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN1936"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sets the specified tag of the slice to the specified value.
If nodegroup is specified, this applies to all slivers of that group.
If node is specified, this only applies to a sliver.</P
><P
>Admins have full access, including on nodegroups.</P
><P
>Non-admins need to have at least one of the roles
attached to the tagtype. In addition:
(*) Users may only set tags of slices or slivers of which they are members.
(*) PIs may only set tags of slices in their site
(*) techs cannot use this method</P
><P
>Returns the new slice_tag_id (&#62; 0) if successful, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN1942"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or string			</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice attribute value					</P
></LI
><LI
><P
>&#13;string, Initscript name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;nil					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier					</P
></LI
><LI
><P
>&#13;string, Node group name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New slice_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSliceToNodes"
>AddSliceToNodes</A
></H2
><P
>Prototype:<A
NAME="AEN2002"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSliceToNodes (auth, slice_id_or_name, node_id_or_hostname_list)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2005"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds the specified slice to the specified nodes. Nodes may be
either local or foreign nodes.</P
><P
>If the slice is already associated with a node, no errors are
returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2010"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname_list</I
></TT
>
: array of int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddSliceToNodesWhitelist"
>AddSliceToNodesWhitelist</A
></H2
><P
>Prototype:<A
NAME="AEN2044"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddSliceToNodesWhitelist (auth, slice_id_or_name, node_id_or_hostname_list)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2047"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds the specified slice to the whitelist on the specified nodes. Nodes may be
either local or foreign nodes.</P
><P
>If the slice is already associated with a node, no errors are
returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2052"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname_list</I
></TT
>
: array of int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AddTagType"
>AddTagType</A
></H2
><P
>Prototype:<A
NAME="AEN2086"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AddTagType (auth, tag_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2089"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Adds a new type of node tag.
Any fields specified are used, otherwise defaults are used.</P
><P
>Returns the new node_tag_id (&#62; 0) if successful,
faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2093"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, New node_tag_id (&#62; 0) if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="AuthCheck"
>AuthCheck</A
></H2
><P
>Prototype:<A
NAME="AEN2124"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>AuthCheck (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2127"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns 1 if the user or node authenticated successfully, faults
otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2130"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="BindObjectToPeer"
>BindObjectToPeer</A
></H2
><P
>Prototype:<A
NAME="AEN2148"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>BindObjectToPeer (auth, object_type, object_id, shortname, remote_object_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2151"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method is a hopefully temporary hack to let the sfa correctly
attach the objects it creates to a remote peer object. This is
needed so that the sfa federation link can work in parallel with
RefreshPeer, as RefreshPeer depends on remote objects being
correctly marked.</P
><P
>BindRemoteObjectToPeer is allowed to admins only.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2155"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>object_type</I
></TT
>
: string, Object type, among 'site','person','slice','node','key'			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>object_id</I
></TT
>
: int, object_id			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string, peer shortname			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>remote_object_id</I
></TT
>
: int, remote object_id, set to 0 if unknown			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="BlacklistKey"
>BlacklistKey</A
></H2
><P
>Prototype:<A
NAME="AEN2185"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>BlacklistKey (auth, key_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2188"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Blacklists a key, disassociating it and all others identical to it
from all accounts and preventing it from ever being added again.</P
><P
>WARNING: Identical keys associated with other accounts with also
be blacklisted.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2193"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int, Key identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="BootGetNodeDetails"
>BootGetNodeDetails</A
></H2
><P
>Prototype:<A
NAME="AEN2214"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>BootGetNodeDetails (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2217"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a set of details about the calling node, including a new
node session value.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2220"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'hmac'					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, HMAC of node key and method call					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, Make and model of the actual machine					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>networks</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean, Is the primary interface for this node							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, (Optional) Hostname							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array, List of interface settings							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node associated with this interface							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int, Bandwidth limit							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string, Address type (e.g., 'ipv4')							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, Session key					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="BootNotifyOwners"
>BootNotifyOwners</A
></H2
><P
>Prototype:<A
NAME="AEN2315"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>BootNotifyOwners (auth, message_id, include_pis, include_techs, include_support)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2318"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Notify the owners of the node, and/or support about an event that
happened on the machine.</P
><P
>Returns 1 if successful.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2322"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string, Message identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>include_pis</I
></TT
>
: int, Notify PIs			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>include_techs</I
></TT
>
: int, Notify technical contacts			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>include_support</I
></TT
>
: int, Notify support			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="BootUpdateNode"
>BootUpdateNode</A
></H2
><P
>Prototype:<A
NAME="AEN2352"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>BootUpdateNode (auth, node_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2355"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Allows the calling node to update its own record. Only the primary
network can be updated, and the node IP cannot be changed.</P
><P
>Returns 1 if updated successfully.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2359"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct or struct			</P
><P
></P
><UL
><LI
><P
>&#13;struct, API authentication structure					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'hmac'							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, HMAC of node key and method call							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, API authentication structure					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, Session key							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'session'							</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string, Last known SSH host key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>primary_network</I
></TT
>
: struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ssh_host_key</I
></TT
>
: string, Last known SSH host key					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteAddress"
>DeleteAddress</A
></H2
><P
>Prototype:<A
NAME="AEN2436"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteAddress (auth, address_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2439"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes an address.</P
><P
>PIs may only delete addresses from their own sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2444"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int, Address identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteAddressType"
>DeleteAddressType</A
></H2
><P
>Prototype:<A
NAME="AEN2465"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteAddressType (auth, address_type_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2468"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes an address type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2472"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier					</P
></LI
><LI
><P
>&#13;string, Address type					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteAddressTypeFromAddress"
>DeleteAddressTypeFromAddress</A
></H2
><P
>Prototype:<A
NAME="AEN2498"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteAddressTypeFromAddress (auth, address_type_id_or_name, address_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2501"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes an address type from the specified address.</P
><P
>PIs may only update addresses of their own sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2506"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier					</P
></LI
><LI
><P
>&#13;string, Address type					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int, Address identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteBootState"
>DeleteBootState</A
></H2
><P
>Prototype:<A
NAME="AEN2535"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteBootState (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2538"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a node boot state.</P
><P
>WARNING: This will cause the deletion of all nodes in this boot
state.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2543"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Boot state			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteConfFile"
>DeleteConfFile</A
></H2
><P
>Prototype:<A
NAME="AEN2564"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteConfFile (auth, conf_file_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2567"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about node
configuration files. If conf_file_ids is specified, only the
specified configuration files will be queried.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2570"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteConfFileFromNode"
>DeleteConfFileFromNode</A
></H2
><P
>Prototype:<A
NAME="AEN2591"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteConfFileFromNode (auth, conf_file_id, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2594"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a configuration file from the specified node. If the node
is not linked to the configuration file, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2598"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteConfFileFromNodeGroup"
>DeleteConfFileFromNodeGroup</A
></H2
><P
>Prototype:<A
NAME="AEN2627"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteConfFileFromNodeGroup (auth, conf_file_id, nodegroup_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2630"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a configuration file from the specified nodegroup. If the nodegroup
is not linked to the configuration file, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2634"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier					</P
></LI
><LI
><P
>&#13;string, Node group name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteIlink"
>DeleteIlink</A
></H2
><P
>Prototype:<A
NAME="AEN2663"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteIlink (auth, ilink_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2666"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified ilink</P
><P
>Attributes may require the caller to have a particular
role in order to be deleted, depending on the related tag type.
Admins may delete attributes of any slice or sliver.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2671"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>ilink_id</I
></TT
>
: int, ilink identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteInitScript"
>DeleteInitScript</A
></H2
><P
>Prototype:<A
NAME="AEN2692"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteInitScript (auth, initscript_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2695"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes an existing initscript.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2699"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>initscript_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Initscript identifier					</P
></LI
><LI
><P
>&#13;string, Initscript name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteInterface"
>DeleteInterface</A
></H2
><P
>Prototype:<A
NAME="AEN2725"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteInterface (auth, interface_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2728"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes an existing interface.</P
><P
>Admins may delete any interface. PIs and techs may only delete
interface interfaces associated with nodes at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2733"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteInterfaceTag"
>DeleteInterfaceTag</A
></H2
><P
>Prototype:<A
NAME="AEN2754"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteInterfaceTag (auth, interface_tag_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2757"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified interface setting</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2762"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_tag_id</I
></TT
>
: int, Interface setting identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteKey"
>DeleteKey</A
></H2
><P
>Prototype:<A
NAME="AEN2783"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteKey (auth, key_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2786"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a key.</P
><P
>Non-admins may only delete their own keys.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2791"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int, Key identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteKeyType"
>DeleteKeyType</A
></H2
><P
>Prototype:<A
NAME="AEN2812"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteKeyType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2815"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a key type.</P
><P
>WARNING: This will cause the deletion of all keys of this type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2820"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Key type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteLeases"
>DeleteLeases</A
></H2
><P
>Prototype:<A
NAME="AEN2841"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteLeases (auth, lease_ids)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2844"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a lease.</P
><P
>Users may only delete leases attached to their slices.
PIs may delete any of the leases for slices at their sites, or any
slices of which they are members. Admins may delete any lease.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2849"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>lease_ids</I
></TT
>
: int or array of int			</P
><P
></P
><UL
><LI
><P
>&#13;int, Lease identifier					</P
></LI
><LI
><P
>&#13;array of int, Lease identifier					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteMessage"
>DeleteMessage</A
></H2
><P
>Prototype:<A
NAME="AEN2875"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteMessage (auth, message_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2878"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a message template.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2882"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string, Message identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNetworkMethod"
>DeleteNetworkMethod</A
></H2
><P
>Prototype:<A
NAME="AEN2903"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNetworkMethod (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2906"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a network method.</P
><P
>WARNING: This will cause the deletion of all network interfaces
that use this method.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2911"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Network method			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNetworkType"
>DeleteNetworkType</A
></H2
><P
>Prototype:<A
NAME="AEN2932"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNetworkType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2935"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a network type.</P
><P
>WARNING: This will cause the deletion of all network interfaces
that use this type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2940"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Network type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNode"
>DeleteNode</A
></H2
><P
>Prototype:<A
NAME="AEN2961"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNode (auth, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2964"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Mark an existing node as deleted.</P
><P
>PIs and techs may only delete nodes at their own sites. ins may
delete nodes at any site.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN2969"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNodeFromPCU"
>DeleteNodeFromPCU</A
></H2
><P
>Prototype:<A
NAME="AEN2995"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNodeFromPCU (auth, node_id_or_hostname, pcu_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN2998"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a node from a PCU.</P
><P
>Non-admins may only update PCUs at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3003"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int, PCU identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNodeGroup"
>DeleteNodeGroup</A
></H2
><P
>Prototype:<A
NAME="AEN3032"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNodeGroup (auth, node_group_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3035"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Delete an existing Node Group.</P
><P
>ins may delete any node group</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3040"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_group_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier					</P
></LI
><LI
><P
>&#13;string, Node group name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNodeTag"
>DeleteNodeTag</A
></H2
><P
>Prototype:<A
NAME="AEN3066"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNodeTag (auth, node_tag_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3069"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified node tag</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3074"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_tag_id</I
></TT
>
: int, Node tag identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteNodeType"
>DeleteNodeType</A
></H2
><P
>Prototype:<A
NAME="AEN3095"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteNodeType (auth, name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3098"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a node node type.</P
><P
>WARNING: This will cause the deletion of all nodes in this boot
state.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3103"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Node type			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePCU"
>DeletePCU</A
></H2
><P
>Prototype:<A
NAME="AEN3124"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePCU (auth, pcu_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3127"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a PCU.</P
><P
>Non-admins may only delete PCUs at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3132"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int, PCU identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePCUProtocolType"
>DeletePCUProtocolType</A
></H2
><P
>Prototype:<A
NAME="AEN3153"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePCUProtocolType (auth, protocol_type_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3156"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a PCU protocol type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3160"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>protocol_type_id</I
></TT
>
: int, PCU protocol type identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePCUType"
>DeletePCUType</A
></H2
><P
>Prototype:<A
NAME="AEN3181"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePCUType (auth, pcu_type_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3184"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a PCU type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3188"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU Type Identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePeer"
>DeletePeer</A
></H2
><P
>Prototype:<A
NAME="AEN3209"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePeer (auth, peer_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3212"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Mark an existing peer as deleted. All entities (e.g., slices,
keys, nodes, etc.) for which this peer is authoritative will also
be deleted or marked as deleted.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3216"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer identifier					</P
></LI
><LI
><P
>&#13;string, Peer name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePerson"
>DeletePerson</A
></H2
><P
>Prototype:<A
NAME="AEN3242"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePerson (auth, person_id_or_email)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3245"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Mark an existing account as deleted.</P
><P
>Users and techs can only delete themselves. PIs can only delete
themselves and other non-PIs at their sites. ins can delete
anyone.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3250"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePersonFromSite"
>DeletePersonFromSite</A
></H2
><P
>Prototype:<A
NAME="AEN3276"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePersonFromSite (auth, person_id_or_email, site_id_or_login_base)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3279"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Removes the specified person from the specified site. If the
person is not a member of the specified site, no error is
returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3283"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePersonFromSlice"
>DeletePersonFromSlice</A
></H2
><P
>Prototype:<A
NAME="AEN3317"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePersonFromSlice (auth, person_id_or_email, slice_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3320"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified person from the specified slice. If the person is
not a member of the slice, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3324"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeletePersonTag"
>DeletePersonTag</A
></H2
><P
>Prototype:<A
NAME="AEN3358"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeletePersonTag (auth, person_tag_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3361"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified person setting</P
><P
>Admins have full access.  Non-admins can change their own tags.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3366"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_tag_id</I
></TT
>
: int, Person setting identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteRole"
>DeleteRole</A
></H2
><P
>Prototype:<A
NAME="AEN3387"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteRole (auth, role_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3390"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a role.</P
><P
>WARNING: This will remove the specified role from all accounts
that possess it, and from all node and slice attributes that refer
to it.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3395"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier					</P
></LI
><LI
><P
>&#13;string, Role					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteRoleFromPerson"
>DeleteRoleFromPerson</A
></H2
><P
>Prototype:<A
NAME="AEN3421"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteRoleFromPerson (auth, role_id_or_name, person_id_or_email)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3424"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified role from the person.</P
><P
>PIs can only revoke the tech and user roles from users and techs
at their sites. ins can revoke any role from any user.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3429"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier					</P
></LI
><LI
><P
>&#13;string, Role					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteRoleFromTagType"
>DeleteRoleFromTagType</A
></H2
><P
>Prototype:<A
NAME="AEN3463"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteRoleFromTagType (auth, role_id_or_name, tag_type_id_or_tagname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3466"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Delete the specified role from the tagtype so that
users with that role can no longer tweak the tag.</P
><P
>Only admins can call this method</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3471"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>role_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier					</P
></LI
><LI
><P
>&#13;string, Role					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_tagname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSession"
>DeleteSession</A
></H2
><P
>Prototype:<A
NAME="AEN3505"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSession (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3508"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Invalidates the current session.</P
><P
>Returns 1 if successful.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3512"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, Session key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'session'					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSite"
>DeleteSite</A
></H2
><P
>Prototype:<A
NAME="AEN3533"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSite (auth, site_id_or_login_base)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3536"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Mark an existing site as deleted. The accounts of people who are
not members of at least one other non-deleted site will also be
marked as deleted. Nodes, PCUs, and slices associated with the
site will be deleted.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3540"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSiteTag"
>DeleteSiteTag</A
></H2
><P
>Prototype:<A
NAME="AEN3566"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSiteTag (auth, site_tag_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3569"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified site setting</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3574"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_tag_id</I
></TT
>
: int, Site setting identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSlice"
>DeleteSlice</A
></H2
><P
>Prototype:<A
NAME="AEN3595"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSlice (auth, slice_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3598"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified slice.</P
><P
>Users may only delete slices of which they are members. PIs may
delete any of the slices at their sites, or any slices of which
they are members. Admins may delete any slice.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3603"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSliceFromNodes"
>DeleteSliceFromNodes</A
></H2
><P
>Prototype:<A
NAME="AEN3629"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSliceFromNodes (auth, slice_id_or_name, node_id_or_hostname_list)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3632"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified slice from the specified nodes. If the slice is
not associated with a node, no errors are returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3636"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname_list</I
></TT
>
: array of int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSliceFromNodesWhitelist"
>DeleteSliceFromNodesWhitelist</A
></H2
><P
>Prototype:<A
NAME="AEN3670"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSliceFromNodesWhitelist (auth, slice_id_or_name, node_id_or_hostname_list)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3673"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified slice from the whitelist on the specified nodes. Nodes may be
either local or foreign nodes.</P
><P
>If the slice is already associated with a node, no errors are
returned.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3678"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname_list</I
></TT
>
: array of int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSliceInstantiation"
>DeleteSliceInstantiation</A
></H2
><P
>Prototype:<A
NAME="AEN3712"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSliceInstantiation (auth, instantiation)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3715"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes a slice instantiation state.</P
><P
>WARNING: This will cause the deletion of all slices of this instantiation.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3720"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string, Slice instantiation state			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteSliceTag"
>DeleteSliceTag</A
></H2
><P
>Prototype:<A
NAME="AEN3741"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteSliceTag (auth, slice_tag_id)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3744"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified slice or sliver attribute.</P
><P
>Attributes may require the caller to have a particular role in
order to be deleted. Users may only delete attributes of
slices or slivers of which they are members. PIs may only delete
attributes of slices or slivers at their sites, or of which they
are members. Admins may delete attributes of any slice or sliver.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3749"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_tag_id</I
></TT
>
: int, Slice tag identifier			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="DeleteTagType"
>DeleteTagType</A
></H2
><P
>Prototype:<A
NAME="AEN3770"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>DeleteTagType (auth, tag_type_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3773"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Deletes the specified node tag type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3777"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GenerateNodeConfFile"
>GenerateNodeConfFile</A
></H2
><P
>Prototype:<A
NAME="AEN3803"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GenerateNodeConfFile (auth, node_id_or_hostname, regenerate_node_key)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3806"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Creates a new node configuration file if all network settings are
present. This function will generate a new node key for the
specified node, effectively invalidating any old configuration
files.</P
><P
>Non-admins can only generate files for nodes at their sites.</P
><P
>Returns the contents of the file if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3811"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>regenerate_node_key</I
></TT
>
: boolean, True if you want to regenerate node key			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Node configuration file			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetAddressTypes"
>GetAddressTypes</A
></H2
><P
>Prototype:<A
NAME="AEN3840"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetAddressTypes (auth, address_type_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3843"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about address
types. If address_type_filter is specified and is an array of
address type identifiers, or a struct of address type attributes,
only address types matching the filter will be returned. If
return_fields is specified, only the specified details will be
returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3846"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier							</P
></LI
><LI
><P
>&#13;string, Address type							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address type									</P
></LI
><LI
><P
>&#13;array of string, Address type									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>address_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier									</P
></LI
><LI
><P
>&#13;array of int, Address type identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address type description									</P
></LI
><LI
><P
>&#13;array of string, Address type description									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Address type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>address_type_id</I
></TT
>
: int, Address type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Address type description					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetAddresses"
>GetAddresses</A
></H2
><P
>Prototype:<A
NAME="AEN3918"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetAddresses (auth, address_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN3921"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about addresses. If
address_filter is specified and is an array of address
identifiers, or a struct of address attributes, only addresses
matching the filter will be returned. If return_fields is
specified, only the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN3924"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Address identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>city</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, City									</P
></LI
><LI
><P
>&#13;array of string, City									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Address identifier									</P
></LI
><LI
><P
>&#13;array of int, Address identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>country</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Country									</P
></LI
><LI
><P
>&#13;array of string, Country									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>line3</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 3									</P
></LI
><LI
><P
>&#13;array of string, Address line 3									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>line2</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 2									</P
></LI
><LI
><P
>&#13;array of string, Address line 2									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>line1</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 1									</P
></LI
><LI
><P
>&#13;array of string, Address line 1									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>address_type_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, Address type identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, Address type identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>state</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, State or province									</P
></LI
><LI
><P
>&#13;array of string, State or province									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>postalcode</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Postal code									</P
></LI
><LI
><P
>&#13;array of string, Postal code									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>address_types</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, Address types									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, Address types									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>address_type_ids</I
></TT
>
: array, Address type identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>city</I
></TT
>
: string, City					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int, Address identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>state</I
></TT
>
: string, State or province					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postalcode</I
></TT
>
: string, Postal code					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>country</I
></TT
>
: string, Country					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>address_types</I
></TT
>
: array, Address types					</P
><P
></P
><UL
><LI
><P
>&#13;string							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line3</I
></TT
>
: string, Address line 3					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line2</I
></TT
>
: string, Address line 2					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line1</I
></TT
>
: string, Address line 1					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetBootMedium"
>GetBootMedium</A
></H2
><P
>Prototype:<A
NAME="AEN4086"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetBootMedium (auth, node_id_or_hostname, action, filename, options)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4089"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method is a redesign based on former, supposedly dedicated,
AdmGenerateNodeConfFile</P
><P
>As compared with its ancestor, this method provides a much more
detailed interface, that allows to
(*) either just preview the node config file -- in which case
the node key is NOT recomputed, and NOT provided in the output
(*) or regenerate the node config file for storage on a floppy
that is, exactly what the ancestor method used todo,
including renewing the node's key
(*) or regenerate the config file and bundle it inside an ISO or USB image
(*) or just provide the generic ISO or USB boot images
in which case of course the node_id_or_hostname parameter is not used</P
><P
>action is expected among the following string constants according the
node type value:</P
><P
>for a 'regular' node:
(*) node-preview
(*) node-floppy
(*) node-iso
(*) node-usb
(*) generic-iso
(*) generic-usb</P
><P
>Apart for the preview mode, this method generates a new node key for the
specified node, effectively invalidating any old boot medium.
Note that 'reservable' nodes do not support 'node-floppy',
'generic-iso' nor 'generic-usb'.</P
><P
>In addition, two return mechanisms are supported.
(*) The default behaviour is that the file's content is returned as a
base64-encoded string. This is how the ancestor method used to work.
To use this method, pass an empty string as the file parameter.</P
><P
>(*) Or, for efficiency -- this makes sense only when the API is used
by the web pages that run on the same host -- the caller may provide
a filename, in which case the resulting file is stored in that location instead.
The filename argument can use the following markers, that are expanded
within the method
- %d : default root dir (some builtin dedicated area under /var/tmp/)
Using this is recommended, and enforced for non-admin users
- %n : the node's name when this makes sense, or a mktemp-like name when
generic media is requested
- %s : a file suffix appropriate in the context (.txt, .iso or the like)
- %v : the bootcd version string (e.g. 4.0)
- %p : the PLC name
- %f : the nodefamily
- %a : arch
With the file-based return mechanism, the method returns the full pathname
of the result file;
** WARNING **
It is the caller's responsability to remove this file after use.</P
><P
>Options: an optional array of keywords.
options are not supported for generic images
Currently supported are
- 'partition' - for USB actions only
- 'cramfs'
- 'serial' or 'serial:&#60;console_spec&#62;'
console_spec (or 'default') is passed as-is to bootcd/build.sh
it is expected to be a colon separated string denoting
tty - baudrate - parity - bits
e.g. ttyS0:115200:n:8
- 'variant:&#60;variantname&#62;'
passed to build.sh as -V &#60;variant&#62;
variants are used to run a different kernel on the bootCD
see kvariant.sh for how to create a variant
- 'no-hangcheck' - disable hangcheck</P
><P
>Tags: the following tags are taken into account when attached to the node:
'serial', 'cramfs', 'kvariant', 'kargs', 'no-hangcheck'</P
><P
>Security:
- Non-admins can only generate files for nodes at their sites.
- Non-admins, when they provide a filename, *must* specify it in the %d area</P
><P
>Housekeeping:
Whenever needed, the method stores intermediate files in a
private area, typically not located under the web server's
accessible area, and are cleaned up by the method.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4102"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>action</I
></TT
>
: string, Action mode, expected value depends of the type of node			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>filename</I
></TT
>
: string, Empty string for verbatim result, resulting file full path otherwise			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>options</I
></TT
>
: array, Options			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Node boot medium, either inlined, or filename, depending on the filename parameter			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetBootStates"
>GetBootStates</A
></H2
><P
>Prototype:<A
NAME="AEN4140"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetBootStates (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4143"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of all valid node boot states.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4146"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Boot state			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetConfFiles"
>GetConfFiles</A
></H2
><P
>Prototype:<A
NAME="AEN4164"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetConfFiles (auth, conf_file_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4167"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about configuration
files. If conf_file_filter is specified and is an array of
configuration file identifiers, or a struct of configuration file
attributes, only configuration files matching the filter will be
returned. If return_fields is specified, only the specified
details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4170"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Configuration file identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_owner</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, chown(1) owner									</P
></LI
><LI
><P
>&#13;array of string, chown(1) owner									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>postinstall_cmd</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Shell command to execute after installing									</P
></LI
><LI
><P
>&#13;array of string, Shell command to execute after installing									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>error_cmd</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Shell command to execute if any error occurs									</P
></LI
><LI
><P
>&#13;array of string, Shell command to execute if any error occurs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>preinstall_cmd</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Shell command to execute prior to installing									</P
></LI
><LI
><P
>&#13;array of string, Shell command to execute prior to installing									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, List of nodes linked to this file									</P
></LI
><LI
><P
>&#13;array of int, List of nodes linked to this file									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dest</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Absolute path where file should be installed									</P
></LI
><LI
><P
>&#13;array of string, Absolute path where file should be installed									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ignore_cmd_errors</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Install file anyway even if an error occurs									</P
></LI
><LI
><P
>&#13;array of boolean, Install file anyway even if an error occurs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Configuration file is active									</P
></LI
><LI
><P
>&#13;array of boolean, Configuration file is active									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Configuration file identifier									</P
></LI
><LI
><P
>&#13;array of int, Configuration file identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_permissions</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, chmod(1) permissions									</P
></LI
><LI
><P
>&#13;array of string, chmod(1) permissions									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>source</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Relative path on the boot server where file can be downloaded									</P
></LI
><LI
><P
>&#13;array of string, Relative path on the boot server where file can be downloaded									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, List of node groups linked to this file									</P
></LI
><LI
><P
>&#13;array of int, List of node groups linked to this file									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>always_update</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Always attempt to install file even if unchanged									</P
></LI
><LI
><P
>&#13;array of boolean, Always attempt to install file even if unchanged									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_group</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, chgrp(1) owner									</P
></LI
><LI
><P
>&#13;array of string, chgrp(1) owner									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postinstall_cmd</I
></TT
>
: string, Shell command to execute after installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>preinstall_cmd</I
></TT
>
: string, Shell command to execute prior to installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: int, List of nodes linked to this file					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dest</I
></TT
>
: string, Absolute path where file should be installed					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ignore_cmd_errors</I
></TT
>
: boolean, Install file anyway even if an error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_permissions</I
></TT
>
: string, chmod(1) permissions					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>always_update</I
></TT
>
: boolean, Always attempt to install file even if unchanged					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_group</I
></TT
>
: string, chgrp(1) owner					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_owner</I
></TT
>
: string, chown(1) owner					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>error_cmd</I
></TT
>
: string, Shell command to execute if any error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: int, List of node groups linked to this file					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Configuration file is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>source</I
></TT
>
: string, Relative path on the boot server where file can be downloaded					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetEventObjects"
>GetEventObjects</A
></H2
><P
>Prototype:<A
NAME="AEN4358"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetEventObjects (auth, event_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4361"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about events and
faults. If event_filter is specified and is an array of event
identifiers, or a struct of event attributes, only events matching
the filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4364"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>event_filter</I
></TT
>
: struct, Attribute filter			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fault_code</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Event fault code							</P
></LI
><LI
><P
>&#13;array of int, Event fault code							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>event_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Event identifier							</P
></LI
><LI
><P
>&#13;array of int, Event identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_type</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, What type of object is this event affecting							</P
></LI
><LI
><P
>&#13;array of string, What type of object is this event affecting							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, ID of objects affected by this event							</P
></LI
><LI
><P
>&#13;array of int, ID of objects affected by this event							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of node responsible for event, if any							</P
></LI
><LI
><P
>&#13;array of int, Identifier of node responsible for event, if any							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Call responsible for this event, including paramters							</P
></LI
><LI
><P
>&#13;array of string, Call responsible for this event, including paramters							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>time</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time that the event took place, in seconds since UNIX epoch							</P
></LI
><LI
><P
>&#13;array of int, Date and time that the event took place, in seconds since UNIX epoch							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of person responsible for event, if any							</P
></LI
><LI
><P
>&#13;array of int, Identifier of person responsible for event, if any							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>message</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, High level description of this event							</P
></LI
><LI
><P
>&#13;array of string, High level description of this event							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>runtime</I
></TT
>
: double or array of double					</P
><P
></P
><UL
><LI
><P
>&#13;double, Runtime of event							</P
></LI
><LI
><P
>&#13;array of double, Runtime of event							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call_name</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Call responsible for this event							</P
></LI
><LI
><P
>&#13;array of string, Call responsible for this event							</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fault_code</I
></TT
>
: int, Event fault code					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_type</I
></TT
>
: string, What type of object is this event affecting					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Identifier of node responsible for event, if any					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>message</I
></TT
>
: string, High level description of this event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>event_id</I
></TT
>
: int, Event identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_id</I
></TT
>
: int, ID of objects affected by this event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call_name</I
></TT
>
: string, Call responsible for this event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call</I
></TT
>
: string, Call responsible for this event, including paramters					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>time</I
></TT
>
: int, Date and time that the event took place, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, Identifier of person responsible for event, if any					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>runtime</I
></TT
>
: double, Runtime of event					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetEvents"
>GetEvents</A
></H2
><P
>Prototype:<A
NAME="AEN4514"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetEvents (auth, event_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4517"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about events and
faults. If event_filter is specified and is an array of event
identifiers, or a struct of event attributes, only events matching
the filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4520"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>event_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Event identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>auth_type</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Type of auth used. i.e. AuthMethod									</P
></LI
><LI
><P
>&#13;array of int, Type of auth used. i.e. AuthMethod									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>fault_code</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Event fault code									</P
></LI
><LI
><P
>&#13;array of int, Event fault code									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>event_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Event identifier									</P
></LI
><LI
><P
>&#13;array of int, Event identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>object_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, IDs of objects affected by this event									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, IDs of objects affected by this event									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of node responsible for event, if any									</P
></LI
><LI
><P
>&#13;array of int, Identifier of node responsible for event, if any									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>call</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Call responsible for this event, including paramters									</P
></LI
><LI
><P
>&#13;array of string, Call responsible for this event, including paramters									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>time</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time that the event took place, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time that the event took place, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of person responsible for event, if any									</P
></LI
><LI
><P
>&#13;array of int, Identifier of person responsible for event, if any									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>message</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, High level description of this event									</P
></LI
><LI
><P
>&#13;array of string, High level description of this event									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>runtime</I
></TT
>
: double or array of double							</P
><P
></P
><UL
><LI
><P
>&#13;double, Runtime of event									</P
></LI
><LI
><P
>&#13;array of double, Runtime of event									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>call_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Call responsible for this event									</P
></LI
><LI
><P
>&#13;array of string, Call responsible for this event									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>object_types</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, What type of object were affected by this event									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, What type of object were affected by this event									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>auth_type</I
></TT
>
: int, Type of auth used. i.e. AuthMethod					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fault_code</I
></TT
>
: int, Event fault code					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_ids</I
></TT
>
: array, IDs of objects affected by this event					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Identifier of node responsible for event, if any					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>message</I
></TT
>
: string, High level description of this event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>event_id</I
></TT
>
: int, Event identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call_name</I
></TT
>
: string, Call responsible for this event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>call</I
></TT
>
: string, Call responsible for this event, including paramters					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>time</I
></TT
>
: int, Date and time that the event took place, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, Identifier of person responsible for event, if any					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>runtime</I
></TT
>
: double, Runtime of event					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>object_types</I
></TT
>
: array, What type of object were affected by this event					</P
><P
></P
><UL
><LI
><P
>&#13;string							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetIlinks"
>GetIlinks</A
></H2
><P
>Prototype:<A
NAME="AEN4704"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetIlinks (auth, ilink_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4707"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
nodes and related tags.</P
><P
>If ilink_filter is specified and is an array of
ilink identifiers, only ilinks matching
the filter will be returned. If return_fields is specified, only
the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4711"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>ilink_filter</I
></TT
>
: array of int or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, ilink identifier					</P
></LI
><LI
><P
>&#13;int, ilink id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ilink_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, ilink identifier									</P
></LI
><LI
><P
>&#13;array of int, ilink identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>src_interface_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, source interface identifier									</P
></LI
><LI
><P
>&#13;array of int, source interface identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, optional ilink value									</P
></LI
><LI
><P
>&#13;array of string, optional ilink value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dst_interface_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, destination interface identifier									</P
></LI
><LI
><P
>&#13;array of int, destination interface identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dst_interface_id</I
></TT
>
: int, destination interface identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, optional ilink value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>src_interface_id</I
></TT
>
: int, source interface identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ilink_id</I
></TT
>
: int, ilink identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInitScripts"
>GetInitScripts</A
></H2
><P
>Prototype:<A
NAME="AEN4802"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInitScripts (auth, initscript_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4805"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about initscripts.
If initscript_filter is specified and is an array of initscript
identifiers, or a struct of initscript attributes, only initscripts
matching the filter will be returned. If return_fields is specified,
only the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4808"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>initscript_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Initscript identifier							</P
></LI
><LI
><P
>&#13;string, Initscript name							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>initscript_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Initscript identifier									</P
></LI
><LI
><P
>&#13;array of int, Initscript identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Initscript is active									</P
></LI
><LI
><P
>&#13;array of boolean, Initscript is active									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Initscript name									</P
></LI
><LI
><P
>&#13;array of string, Initscript name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>script</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Initscript									</P
></LI
><LI
><P
>&#13;array of string, Initscript									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscript_id</I
></TT
>
: int, Initscript identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Initscript is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Initscript name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>script</I
></TT
>
: string, Initscript					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceAlias"
>GetInterfaceAlias</A
></H2
><P
>Prototype:<A
NAME="AEN4891"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceAlias (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4894"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag alias</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4897"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceBackdoor"
>GetInterfaceBackdoor</A
></H2
><P
>Prototype:<A
NAME="AEN4928"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceBackdoor (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4931"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag backdoor</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4934"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceChannel"
>GetInterfaceChannel</A
></H2
><P
>Prototype:<A
NAME="AEN4965"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceChannel (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN4968"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag channel</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN4971"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceDriver"
>GetInterfaceDriver</A
></H2
><P
>Prototype:<A
NAME="AEN5002"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceDriver (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5005"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag driver</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5008"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceEssid"
>GetInterfaceEssid</A
></H2
><P
>Prototype:<A
NAME="AEN5039"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceEssid (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5042"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag essid</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5045"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceFreq"
>GetInterfaceFreq</A
></H2
><P
>Prototype:<A
NAME="AEN5076"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceFreq (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5079"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag freq</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5082"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceIfname"
>GetInterfaceIfname</A
></H2
><P
>Prototype:<A
NAME="AEN5113"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceIfname (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5116"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag ifname</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5119"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceIwconfig"
>GetInterfaceIwconfig</A
></H2
><P
>Prototype:<A
NAME="AEN5150"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceIwconfig (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5153"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag iwconfig</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5156"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceIwpriv"
>GetInterfaceIwpriv</A
></H2
><P
>Prototype:<A
NAME="AEN5187"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceIwpriv (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5190"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag iwpriv</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5193"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceKey"
>GetInterfaceKey</A
></H2
><P
>Prototype:<A
NAME="AEN5224"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceKey (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5227"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag key</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5230"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceKey1"
>GetInterfaceKey1</A
></H2
><P
>Prototype:<A
NAME="AEN5261"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceKey1 (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5264"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag key1</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5267"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceKey2"
>GetInterfaceKey2</A
></H2
><P
>Prototype:<A
NAME="AEN5298"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceKey2 (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5301"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag key2</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5304"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceKey3"
>GetInterfaceKey3</A
></H2
><P
>Prototype:<A
NAME="AEN5335"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceKey3 (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5338"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag key3</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5341"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceKey4"
>GetInterfaceKey4</A
></H2
><P
>Prototype:<A
NAME="AEN5372"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceKey4 (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5375"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag key4</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5378"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceMode"
>GetInterfaceMode</A
></H2
><P
>Prototype:<A
NAME="AEN5409"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceMode (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5412"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag mode</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5415"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceNw"
>GetInterfaceNw</A
></H2
><P
>Prototype:<A
NAME="AEN5446"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceNw (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5449"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag nw</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5452"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceRate"
>GetInterfaceRate</A
></H2
><P
>Prototype:<A
NAME="AEN5483"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceRate (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5486"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag rate</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5489"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceSecurityMode"
>GetInterfaceSecurityMode</A
></H2
><P
>Prototype:<A
NAME="AEN5520"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceSecurityMode (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5523"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag securitymode</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5526"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceSens"
>GetInterfaceSens</A
></H2
><P
>Prototype:<A
NAME="AEN5557"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceSens (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5560"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Interface objects using tag sens</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5563"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaceTags"
>GetInterfaceTags</A
></H2
><P
>Prototype:<A
NAME="AEN5594"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaceTags (auth, interface_tag_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5597"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
interfaces and related settings.</P
><P
>If interface_tag_filter is specified and is an array of
interface setting identifiers, only interface settings matching
the filter will be returned. If return_fields is specified, only
the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5601"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_tag_filter</I
></TT
>
: array of int or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Interface setting identifier					</P
></LI
><LI
><P
>&#13;int, Interface setting id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address									</P
></LI
><LI
><P
>&#13;array of string, IP address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Interface setting value									</P
></LI
><LI
><P
>&#13;array of string, Interface setting value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier									</P
></LI
><LI
><P
>&#13;array of int, Node interface identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_tag_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Interface setting identifier									</P
></LI
><LI
><P
>&#13;array of int, Interface setting identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_tag_id</I
></TT
>
: int, Interface setting identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Interface setting value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetInterfaces"
>GetInterfaces</A
></H2
><P
>Prototype:<A
NAME="AEN5725"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetInterfaces (auth, interface_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5728"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about network
interfaces. If interfaces_filter is specified and is an array of
interface identifiers, or a struct of interface fields and
values, only interfaces matching the filter will be
returned.</P
><P
>If return_fields is given, only the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5732"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_filter</I
></TT
>
: array of int or string or int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier							</P
></LI
><LI
><P
>&#13;string, IP address							</P
></LI
></UL
></LI
><LI
><P
>&#13;int, interface id					</P
></LI
><LI
><P
>&#13;string, ip address					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Subnet address									</P
></LI
><LI
><P
>&#13;array of string, Subnet address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Is the primary interface for this node									</P
></LI
><LI
><P
>&#13;array of boolean, Is the primary interface for this node									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of primary DNS server									</P
></LI
><LI
><P
>&#13;array of string, IP address of primary DNS server									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Optional) Hostname									</P
></LI
><LI
><P
>&#13;array of string, (Optional) Hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, MAC address									</P
></LI
><LI
><P
>&#13;array of string, MAC address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of interface settings									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of interface settings									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier									</P
></LI
><LI
><P
>&#13;array of int, Node interface identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Network broadcast address									</P
></LI
><LI
><P
>&#13;array of string, Network broadcast address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Addressing method (e.g., 'static' or 'dhcp')									</P
></LI
><LI
><P
>&#13;array of string, Addressing method (e.g., 'static' or 'dhcp')									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Subnet mask									</P
></LI
><LI
><P
>&#13;array of string, Subnet mask									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node associated with this interface									</P
></LI
><LI
><P
>&#13;array of int, Node associated with this interface									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of secondary DNS server									</P
></LI
><LI
><P
>&#13;array of string, IP address of secondary DNS server									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address									</P
></LI
><LI
><P
>&#13;array of string, IP address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Bandwidth limit									</P
></LI
><LI
><P
>&#13;array of int, Bandwidth limit									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Address type (e.g., 'ipv4')									</P
></LI
><LI
><P
>&#13;array of string, Address type (e.g., 'ipv4')									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of primary gateway									</P
></LI
><LI
><P
>&#13;array of string, IP address of primary gateway									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean, Is the primary interface for this node					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, (Optional) Hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array, List of interface settings					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node associated with this interface					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int, Bandwidth limit					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string, Address type (e.g., 'ipv4')					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetKeyTypes"
>GetKeyTypes</A
></H2
><P
>Prototype:<A
NAME="AEN5971"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetKeyTypes (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5974"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of all valid key types.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN5977"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Key type			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetKeys"
>GetKeys</A
></H2
><P
>Prototype:<A
NAME="AEN5995"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetKeys (auth, key_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN5998"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about keys. If
key_filter is specified and is an array of key identifiers, or a
struct of key attributes, only keys matching the filter will be
returned. If return_fields is specified, only the specified
details will be returned.</P
><P
>Admin may query all keys. Non-admins may only query their own
keys.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6002"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Key identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_key_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign key identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign key identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Key type									</P
></LI
><LI
><P
>&#13;array of string, Key type									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Key value									</P
></LI
><LI
><P
>&#13;array of string, Key value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, User to which this key belongs									</P
></LI
><LI
><P
>&#13;array of int, User to which this key belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Key identifier									</P
></LI
><LI
><P
>&#13;array of int, Key identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this key belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this key belongs									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this key belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string, Key type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, User to which this key belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int, Key identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_key_id</I
></TT
>
: int, Foreign key identifier at peer					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetLeaseGranularity"
>GetLeaseGranularity</A
></H2
><P
>Prototype:<A
NAME="AEN6105"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetLeaseGranularity (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6108"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns the granularity in seconds for the reservation system</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6111"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, the granularity in seconds for the reservation system			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetLeases"
>GetLeases</A
></H2
><P
>Prototype:<A
NAME="AEN6129"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetLeases (auth, lease_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6132"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about leases. If
lease_filter is specified and is an array of lease identifiers or
lease names, or a struct of lease attributes, only leases matching
the filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>All leases are exposed to all users.</P
><P
>In addition to the usual filter capabilities, the following are supported:
* GetLeases ({ 'alive' : '2010-02-20 20:00' , &#60;regular_filter_fields...&#62; })
returns the leases that are active at that point in time
* GetLeases ({ 'alive' : ('2010-02-20 20:00' , '2010-02-20 21:00' ) , ... })
ditto for a time range</P
><P
>This is implemented in the LeaseFilter class; negation actually is supported
through the usual '~alive' form, although maybe not really useful.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6138"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>lease_filter</I
></TT
>
: int or array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;int, Lease identifier					</P
></LI
><LI
><P
>&#13;array of int, Lease identifier					</P
></LI
><LI
><P
>&#13;struct, Lease filter -- adds the 'alive' and 'clip' capabilities for filtering on leases					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>lease_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Lease identifier									</P
></LI
><LI
><P
>&#13;array of int, Lease identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice name									</P
></LI
><LI
><P
>&#13;array of string, Slice name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Fully qualified hostname									</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of the site to which this slice belongs									</P
></LI
><LI
><P
>&#13;array of int, Identifier of the site to which this slice belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>alive</I
></TT
>
: int or string or array							</P
><P
></P
><UL
><LI
><P
>&#13;int, int_timestamp: leases alive at that time									</P
></LI
><LI
><P
>&#13;string, str_timestamp: leases alive at that time									</P
></LI
><LI
><P
>&#13;array, timeslot: the leases alive during this timeslot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node type									</P
></LI
><LI
><P
>&#13;array of string, Node type									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier									</P
></LI
><LI
><P
>&#13;array of int, Node identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>clip</I
></TT
>
: int or string or array							</P
><P
></P
><UL
><LI
><P
>&#13;int, int_timestamp: leases alive after that time									</P
></LI
><LI
><P
>&#13;string, str_timestamp: leases alive after at that time									</P
></LI
><LI
><P
>&#13;array, timeslot: the leases alive during this timeslot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>duration</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, duration in seconds									</P
></LI
><LI
><P
>&#13;array of int, duration in seconds									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expired</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, time slot is over									</P
></LI
><LI
><P
>&#13;array of boolean, time slot is over									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>t_from</I
></TT
>
: int or string or array of int or string							</P
><P
></P
><UL
><LI
><P
>&#13;int or string									</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)											</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of int or string									</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)											</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>t_until</I
></TT
>
: int or string or array of int or string							</P
><P
></P
><UL
><LI
><P
>&#13;int or string									</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)											</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of int or string									</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)											</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>lease_id</I
></TT
>
: int, Lease identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Identifier of the site to which this slice belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string, Node type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>duration</I
></TT
>
: int, duration in seconds					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>expired</I
></TT
>
: boolean, time slot is over					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>t_from</I
></TT
>
: int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)							</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>t_until</I
></TT
>
: int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)							</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetMessages"
>GetMessages</A
></H2
><P
>Prototype:<A
NAME="AEN6345"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetMessages (auth, message_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6348"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about message
templates. If message template_filter is specified and is an array
of message template identifiers, or a struct of message template
attributes, only message templates matching the filter will be
returned. If return_fields is specified, only the specified
details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6351"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_filter</I
></TT
>
: array of string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Message identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Message is enabled									</P
></LI
><LI
><P
>&#13;array of boolean, Message is enabled									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Message identifier									</P
></LI
><LI
><P
>&#13;array of string, Message identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>template</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Message template									</P
></LI
><LI
><P
>&#13;array of string, Message template									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>subject</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Message summary									</P
></LI
><LI
><P
>&#13;array of string, Message summary									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Message is enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string, Message identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>template</I
></TT
>
: string, Message template					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>subject</I
></TT
>
: string, Message summary					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNetworkMethods"
>GetNetworkMethods</A
></H2
><P
>Prototype:<A
NAME="AEN6429"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNetworkMethods (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6432"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a list of all valid network methods.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6435"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Network method			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNetworkTypes"
>GetNetworkTypes</A
></H2
><P
>Prototype:<A
NAME="AEN6453"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNetworkTypes (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6456"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a list of all valid network types.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6459"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Network type			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeArch"
>GetNodeArch</A
></H2
><P
>Prototype:<A
NAME="AEN6477"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeArch (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6480"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag arch</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6483"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeCramfs"
>GetNodeCramfs</A
></H2
><P
>Prototype:<A
NAME="AEN6514"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeCramfs (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6517"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag cramfs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6520"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeDeployment"
>GetNodeDeployment</A
></H2
><P
>Prototype:<A
NAME="AEN6551"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeDeployment (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6554"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag deployment</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6557"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeExtensions"
>GetNodeExtensions</A
></H2
><P
>Prototype:<A
NAME="AEN6588"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeExtensions (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6591"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag extensions</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6594"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeFcdistro"
>GetNodeFcdistro</A
></H2
><P
>Prototype:<A
NAME="AEN6625"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeFcdistro (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6628"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag fcdistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6631"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeFlavour"
>GetNodeFlavour</A
></H2
><P
>Prototype:<A
NAME="AEN6662"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeFlavour (auth, node_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6665"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns detailed information on a given node's flavour, i.e. its
base installation.</P
><P
>This depends on the global PLC settings in the PLC_FLAVOUR area,
optionnally overridden by any of the following tags if set on that node:</P
><P
>'arch', 'pldistro', 'fcdistro',
'deployment', 'extensions', 'virt',</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6670"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>extensions</I
></TT
>
: array of string, extensions to add to the base install					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fcdistro</I
></TT
>
: string, the fcdistro this node should be based upon					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodefamily</I
></TT
>
: string, the nodefamily this node should be based upon					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>plain</I
></TT
>
: boolean, use plain bootstrapfs image if set (for tests)					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeGroups"
>GetNodeGroups</A
></H2
><P
>Prototype:<A
NAME="AEN6709"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeGroups (auth, nodegroup_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6712"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about node groups.
If nodegroup_filter is specified and is an array of node group
identifiers or names, or a struct of node group attributes, only
node groups matching the filter will be returned. If return_fields
is specified, only the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6715"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier							</P
></LI
><LI
><P
>&#13;string, Node group name							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of node_ids that belong to this nodegroup									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of node_ids that belong to this nodegroup									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, value that the nodegroup definition is based upon									</P
></LI
><LI
><P
>&#13;array of string, value that the nodegroup definition is based upon									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>groupname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node group name									</P
></LI
><LI
><P
>&#13;array of string, Node group name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier									</P
></LI
><LI
><P
>&#13;array of int, Node group identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Tag name that the nodegroup definition is based upon									</P
></LI
><LI
><P
>&#13;array of string, Tag name that the nodegroup definition is based upon									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type id									</P
></LI
><LI
><P
>&#13;array of int, Node tag type id									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of configuration files specific to this node group									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of configuration files specific to this node group									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of node_ids that belong to this nodegroup					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, value that the nodegroup definition is based upon					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>groupname</I
></TT
>
: string, Node group name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_id</I
></TT
>
: int, Node group identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Tag name that the nodegroup definition is based upon					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type id					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array, List of configuration files specific to this node group					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeHrn"
>GetNodeHrn</A
></H2
><P
>Prototype:<A
NAME="AEN6849"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeHrn (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6852"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6855"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeKargs"
>GetNodeKargs</A
></H2
><P
>Prototype:<A
NAME="AEN6886"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeKargs (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6889"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag kargs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6892"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeKvariant"
>GetNodeKvariant</A
></H2
><P
>Prototype:<A
NAME="AEN6923"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeKvariant (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6926"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag kvariant</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6929"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeNoHangcheck"
>GetNodeNoHangcheck</A
></H2
><P
>Prototype:<A
NAME="AEN6960"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeNoHangcheck (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN6963"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag no-hangcheck</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN6966"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodePlainBootstrapfs"
>GetNodePlainBootstrapfs</A
></H2
><P
>Prototype:<A
NAME="AEN6997"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodePlainBootstrapfs (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7000"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag plain-bootstrapfs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7003"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodePldistro"
>GetNodePldistro</A
></H2
><P
>Prototype:<A
NAME="AEN7034"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodePldistro (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7037"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag pldistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7040"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeSerial"
>GetNodeSerial</A
></H2
><P
>Prototype:<A
NAME="AEN7071"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeSerial (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7074"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag serial</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7077"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeTags"
>GetNodeTags</A
></H2
><P
>Prototype:<A
NAME="AEN7108"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeTags (auth, node_tag_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7111"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
nodes and related tags.</P
><P
>If node_tag_filter is specified and is an array of
node tag identifiers, only node tags matching
the filter will be returned. If return_fields is specified, only
the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7115"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_tag_filter</I
></TT
>
: array of int or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Node tag identifier					</P
></LI
><LI
><P
>&#13;int, Node tag id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Fully qualified hostname									</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag value									</P
></LI
><LI
><P
>&#13;array of string, Node tag value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier									</P
></LI
><LI
><P
>&#13;array of int, Node identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_tag_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_tag_id</I
></TT
>
: int, Node tag identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Node tag value					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeTypes"
>GetNodeTypes</A
></H2
><P
>Prototype:<A
NAME="AEN7239"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeTypes (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7242"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of all valid node node types.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7245"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Node type			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodeVirt"
>GetNodeVirt</A
></H2
><P
>Prototype:<A
NAME="AEN7263"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodeVirt (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7266"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Node objects using tag virt</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7269"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetNodes"
>GetNodes</A
></H2
><P
>Prototype:<A
NAME="AEN7300"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetNodes (auth, node_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7303"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about nodes. If
node_filter is specified and is an array of node identifiers or
hostnames, or a struct of node attributes, only nodes matching the
filter will be returned.</P
><P
>If return_fields is specified, only the specified details will be
returned. NOTE that if return_fields is unspecified, the complete
set of native fields are returned, which DOES NOT include tags at
this time.</P
><P
>Some fields may only be viewed by admins.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7308"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier							</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, hostname					</P
></LI
><LI
><P
>&#13;int, node_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node key									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Boot state									</P
></LI
><LI
><P
>&#13;array of string, Boot state									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Site at which this node is located									</P
></LI
><LI
><P
>&#13;array of int, Site at which this node is located									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCUs that control this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCUs that control this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node type									</P
></LI
><LI
><P
>&#13;array of string, Node type									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node session value									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node session value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Last known SSH host key									</P
></LI
><LI
><P
>&#13;array of string, Last known SSH host key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_pcu_reboot</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was attempted									</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was attempted									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verified</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Whether the node configuration is verified correct									</P
></LI
><LI
><P
>&#13;array of boolean, Whether the node configuration is verified correct									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_contact</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last contacted plc									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last contacted plc									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign node identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign node identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Fully qualified hostname									</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Run level									</P
></LI
><LI
><P
>&#13;array of string, Run level									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_time_spent_offline</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last offline after failure and before reboot									</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last offline after failure and before reboot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Apparent Boot CD version									</P
></LI
><LI
><P
>&#13;array of string, Apparent Boot CD version									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this node belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this node belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier									</P
></LI
><LI
><P
>&#13;array of int, Node identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_boot</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last booted									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last booted									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of network interfaces that this node has									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of network interfaces that this node has									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of configuration files specific to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of configuration files specific to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_pcu_confirmation</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was confirmed									</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was confirmed									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of node groups that this node is in									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of node groups that this node is in									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids_whitelist</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices allowed on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices allowed on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_time_spent_online</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last online before shutdown/failure									</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last online before shutdown/failure									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Random value generated by the node at last boot									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Random value generated by the node at last boot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_download</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node boot image was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node boot image was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Make and model of the actual machine									</P
></LI
><LI
><P
>&#13;array of string, Make and model of the actual machine									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCU ports that this node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCU ports that this node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, (Admin only) Node key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, (Admin only) Node session value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site at which this node is located					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array, List of PCUs that control this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string, Node type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_boot</I
></TT
>
: int, Date and time when node last booted					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_ids</I
></TT
>
: array, List of network interfaces that this node has					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids_whitelist</I
></TT
>
: array, List of slices allowed on this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string, Run level					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string, Last known SSH host key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_reboot</I
></TT
>
: int, Date and time when PCU reboot was attempted					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_tag_ids</I
></TT
>
: array, List of tags attached to this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: array, List of node groups that this node is in					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>verified</I
></TT
>
: boolean, Whether the node configuration is verified correct					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_contact</I
></TT
>
: int, Date and time when node last contacted plc					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_node_id</I
></TT
>
: int, Foreign node identifier at peer					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_offline</I
></TT
>
: int, Length of time the node was last offline after failure and before reboot					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array, List of configuration files specific to this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_online</I
></TT
>
: int, Length of time the node was last online before shutdown/failure					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array, List of slices on this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string, (Admin only) Random value generated by the node at last boot					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string, Apparent Boot CD version					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_confirmation</I
></TT
>
: int, Date and time when PCU reboot was confirmed					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_download</I
></TT
>
: int, Date and time when node boot image was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, Make and model of the actual machine					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this node belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array, List of PCU ports that this node is connected to					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPCUProtocolTypes"
>GetPCUProtocolTypes</A
></H2
><P
>Prototype:<A
NAME="AEN7775"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPCUProtocolTypes (auth, protocol_type_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7778"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of PCU Types.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7781"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>protocol_type_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, PCU type identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_protocol_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU protocol type identifier									</P
></LI
><LI
><P
>&#13;array of int, PCU protocol type identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>supported</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Is the port/protocol supported by PLC									</P
></LI
><LI
><P
>&#13;array of boolean, Is the port/protocol supported by PLC									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Protocol									</P
></LI
><LI
><P
>&#13;array of string, Protocol									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>port</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU port									</P
></LI
><LI
><P
>&#13;array of int, PCU port									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU type identifier									</P
></LI
><LI
><P
>&#13;array of int, PCU type identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_protocol_type_id</I
></TT
>
: int, PCU protocol type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>supported</I
></TT
>
: boolean, Is the port/protocol supported by PLC					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, Protocol					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>port</I
></TT
>
: int, PCU port					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU type identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPCUTypes"
>GetPCUTypes</A
></H2
><P
>Prototype:<A
NAME="AEN7870"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPCUTypes (auth, pcu_type_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7873"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of PCU Types.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7876"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU Type Identifier							</P
></LI
><LI
><P
>&#13;string, PCU model							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, model					</P
></LI
><LI
><P
>&#13;int, node_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU model									</P
></LI
><LI
><P
>&#13;array of string, PCU model									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_protocol_types</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, PCU Protocol Type List									</P
><P
></P
><UL
><LI
><P
>&#13;struct											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, PCU Protocol Type List									</P
><P
></P
><UL
><LI
><P
>&#13;struct											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_protocol_type_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, PCU Protocol Type Identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, PCU Protocol Type Identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU full name									</P
></LI
><LI
><P
>&#13;array of string, PCU full name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU Type Identifier									</P
></LI
><LI
><P
>&#13;array of int, PCU Type Identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_protocol_types</I
></TT
>
: array, PCU Protocol Type List					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_protocol_type_ids</I
></TT
>
: array, PCU Protocol Type Identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, PCU full name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU Type Identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPCUs"
>GetPCUs</A
></H2
><P
>Prototype:<A
NAME="AEN7992"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPCUs (auth, pcu_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN7995"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about power control
units (PCUs). If pcu_filter is specified and is an array of PCU
identifiers, or a struct of PCU attributes, only PCUs matching the
filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>Admin may query all PCUs. Non-admins may only query the PCUs at
their sites.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN7999"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, PCU identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>username</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU username									</P
></LI
><LI
><P
>&#13;array of string, PCU username									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU protocol, e.g. ssh, https, telnet									</P
></LI
><LI
><P
>&#13;array of string, PCU protocol, e.g. ssh, https, telnet									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of nodes that this PCU controls									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of nodes that this PCU controls									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU IP address									</P
></LI
><LI
><P
>&#13;array of string, PCU IP address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, PCU identifier									</P
></LI
><LI
><P
>&#13;array of int, PCU identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU hostname									</P
></LI
><LI
><P
>&#13;array of string, PCU hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of site where PCU is located									</P
></LI
><LI
><P
>&#13;array of int, Identifier of site where PCU is located									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of the port numbers that each node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of the port numbers that each node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU model string									</P
></LI
><LI
><P
>&#13;array of string, PCU model string									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, PCU username									</P
></LI
><LI
><P
>&#13;array of string, PCU username									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>notes</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Miscellaneous notes									</P
></LI
><LI
><P
>&#13;array of string, Miscellaneous notes									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>username</I
></TT
>
: string, PCU username					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, PCU protocol, e.g. ssh, https, telnet					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of nodes that this PCU controls					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, PCU IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int, PCU identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Identifier of site where PCU is located					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, PCU username					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>notes</I
></TT
>
: string, Miscellaneous notes					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, PCU hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model string					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array, List of the port numbers that each node is connected to					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPeerData"
>GetPeerData</A
></H2
><P
>Prototype:<A
NAME="AEN8183"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPeerData (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8186"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns lists of local objects that a peer should cache in its
database as foreign objects. Also returns the list of foreign
nodes in this database, for which the calling peer is
authoritative, to assist in synchronization of slivers.</P
><P
>See the implementation of RefreshPeer for how this data is used.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8190"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, peer</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>Slices</I
></TT
>
: array, List of local slices					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>Keys</I
></TT
>
: array, List of local keys					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>Sites</I
></TT
>
: array, List of local sites					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>Persons</I
></TT
>
: array, List of local users					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>Nodes</I
></TT
>
: array, List of local nodes					</P
><P
></P
><UL
><LI
><P
>&#13;struct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>db_time</I
></TT
>
: double, (Debug) Database fetch time					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPeerName"
>GetPeerName</A
></H2
><P
>Prototype:<A
NAME="AEN8242"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPeerName (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8245"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns this peer's name, as defined in the config as PLC_NAME</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8248"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, peer, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer name			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPeers"
>GetPeers</A
></H2
><P
>Prototype:<A
NAME="AEN8266"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPeers (auth, peer_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8269"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about peers. If
person_filter is specified and is an array of peer identifiers or
peer names, or a struct of peer attributes, only peers matching
the filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8272"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer identifier							</P
></LI
><LI
><P
>&#13;string, Peer name							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of nodes for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of nodes for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of keys for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of keys for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of users for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of users for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peername</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer name									</P
></LI
><LI
><P
>&#13;array of string, Peer name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer API URL									</P
></LI
><LI
><P
>&#13;array of string, Peer API URL									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer GPG public key									</P
></LI
><LI
><P
>&#13;array of string, Peer GPG public key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hrn_root</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Root of this peer in a hierarchical naming space									</P
></LI
><LI
><P
>&#13;array of string, Root of this peer in a hierarchical naming space									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>cacert</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer SSL public certificate									</P
></LI
><LI
><P
>&#13;array of string, Peer SSL public certificate									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of sites for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of sites for which this peer is authoritative									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer identifier									</P
></LI
><LI
><P
>&#13;array of int, Peer identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Peer short name									</P
></LI
><LI
><P
>&#13;array of string, Peer short name									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of nodes for which this peer is authoritative					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array, List of keys for which this peer is authoritative					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_url</I
></TT
>
: string, Peer API URL					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Peer GPG public key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn_root</I
></TT
>
: string, Root of this peer in a hierarchical naming space					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>cacert</I
></TT
>
: string, Peer SSL public certificate					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array, List of sites for which this peer is authoritative					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array, List of users for which this peer is authoritative					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peername</I
></TT
>
: string, Peer name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array, List of slices for which this peer is authoritative					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string, Peer short name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersonAdvanced"
>GetPersonAdvanced</A
></H2
><P
>Prototype:<A
NAME="AEN8488"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersonAdvanced (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8491"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Person objects using tag advanced</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8494"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersonColumnconf"
>GetPersonColumnconf</A
></H2
><P
>Prototype:<A
NAME="AEN8525"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersonColumnconf (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8528"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Person objects using tag columnconf</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8531"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersonHrn"
>GetPersonHrn</A
></H2
><P
>Prototype:<A
NAME="AEN8562"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersonHrn (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8565"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Person objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8568"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersonShowconf"
>GetPersonShowconf</A
></H2
><P
>Prototype:<A
NAME="AEN8599"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersonShowconf (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8602"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Person objects using tag showconf</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8605"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersonTags"
>GetPersonTags</A
></H2
><P
>Prototype:<A
NAME="AEN8636"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersonTags (auth, person_tag_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8639"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
persons and related settings.</P
><P
>If person_tag_filter is specified and is an array of
person setting identifiers, only person settings matching
the filter will be returned. If return_fields is specified, only
the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8643"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_tag_filter</I
></TT
>
: array of int or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Person setting identifier					</P
></LI
><LI
><P
>&#13;int, Person setting id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Person setting value									</P
></LI
><LI
><P
>&#13;array of string, Person setting value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_tag_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Person setting identifier									</P
></LI
><LI
><P
>&#13;array of int, Person setting identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier									</P
></LI
><LI
><P
>&#13;array of int, User identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Primary e-mail address									</P
></LI
><LI
><P
>&#13;array of string, Primary e-mail address									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_tag_id</I
></TT
>
: int, Person setting identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, User identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string, Primary e-mail address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Person setting value					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPersons"
>GetPersons</A
></H2
><P
>Prototype:<A
NAME="AEN8767"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPersons (auth, person_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN8770"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about users. If
person_filter is specified and is an array of user identifiers or
usernames, or a struct of user attributes, only users matching the
filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>Users and techs may only retrieve details about themselves. PIs
may retrieve details about themselves and others at their
sites. Admins and nodes may retrieve details about all accounts.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN8774"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier							</P
></LI
><LI
><P
>&#13;string, Primary e-mail address							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, email					</P
></LI
><LI
><P
>&#13;int, person_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time of last update									</P
></LI
><LI
><P
>&#13;array of int, Date and time of last update									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Surname									</P
></LI
><LI
><P
>&#13;array of string, Surname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of site identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of site identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Given name									</P
></LI
><LI
><P
>&#13;array of string, Given name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Title									</P
></LI
><LI
><P
>&#13;array of string, Title									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier									</P
></LI
><LI
><P
>&#13;array of int, User identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this user belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this user belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Primary e-mail address									</P
></LI
><LI
><P
>&#13;array of string, Primary e-mail address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Biography									</P
></LI
><LI
><P
>&#13;array of string, Biography									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of key identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of key identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Telephone number									</P
></LI
><LI
><P
>&#13;array of string, Telephone number									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign user identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign user identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this person									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this person									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Account password in crypt() form									</P
></LI
><LI
><P
>&#13;array of string, Account password in crypt() form									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Home page									</P
></LI
><LI
><P
>&#13;array of string, Home page									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verification_key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Reset password key									</P
></LI
><LI
><P
>&#13;array of string, Reset password key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Has been enabled									</P
></LI
><LI
><P
>&#13;array of boolean, Has been enabled									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when account was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when account was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verification_expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when verification_key expires									</P
></LI
><LI
><P
>&#13;array of int, Date and time when verification_key expires									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string, Biography					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string, Given name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array, List of role identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time of last update					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array, List of roles					</P
><P
></P
><UL
><LI
><P
>&#13;string							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string, Title					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, Home page					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array, List of key identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Has been enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array, List of slice identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string, Telephone number					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_person_id</I
></TT
>
: int, Foreign user identifier at peer					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string, Surname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, User identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int, Date and time when account was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array, List of site identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this user belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string, Primary e-mail address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_tag_ids</I
></TT
>
: array, List of tags attached to this person					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetPlcRelease"
>GetPlcRelease</A
></H2
><P
>Prototype:<A
NAME="AEN9104"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetPlcRelease (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9107"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns various information about the current myplc installation.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9110"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>rpms</I
></TT
>
: string					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>build</I
></TT
>
: string					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tags</I
></TT
>
: string					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetRoles"
>GetRoles</A
></H2
><P
>Prototype:<A
NAME="AEN9138"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetRoles (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9141"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Get an array of structs containing details about all roles.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9144"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Role					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>role_id</I
></TT
>
: int, Role identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSession"
>GetSession</A
></H2
><P
>Prototype:<A
NAME="AEN9169"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSession (auth, expires)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9172"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a new session key if a user or node authenticated
successfully, faults otherwise.</P
><P
>Default value for 'expires' is 24 hours.  Otherwise, the returned
session 'expires' in the given number of seconds.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9176"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, expires			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Session key			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSessions"
>GetSessions</A
></H2
><P
>Prototype:<A
NAME="AEN9197"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSessions (auth, session_filter)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9200"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about users sessions. If
session_filter is specified and is an array of user identifiers or
session_keys, or a struct of session attributes, only sessions matching the
filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9203"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>session_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Account identifier, if applicable							</P
></LI
><LI
><P
>&#13;string, Session key							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Account identifier, if applicable									</P
></LI
><LI
><P
>&#13;array of int, Account identifier, if applicable									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier, if applicable									</P
></LI
><LI
><P
>&#13;array of int, Node identifier, if applicable									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>session_id</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Session key									</P
></LI
><LI
><P
>&#13;array of string, Session key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when session expires, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when session expires, in seconds since UNIX epoch									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, Account identifier, if applicable					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier, if applicable					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, Date and time when session expires, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session_id</I
></TT
>
: string, Session key					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSiteTags"
>GetSiteTags</A
></H2
><P
>Prototype:<A
NAME="AEN9280"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSiteTags (auth, site_tag_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9283"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
sites and related settings.</P
><P
>If site_tag_filter is specified and is an array of
site setting identifiers, only site settings matching
the filter will be returned. If return_fields is specified, only
the specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9287"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_tag_filter</I
></TT
>
: array of int or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Site setting identifier					</P
></LI
><LI
><P
>&#13;int, Site setting id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier									</P
></LI
><LI
><P
>&#13;array of int, Site identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Site setting value									</P
></LI
><LI
><P
>&#13;array of string, Site setting value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Site slice prefix									</P
></LI
><LI
><P
>&#13;array of string, Site slice prefix									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_tag_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Site setting identifier									</P
></LI
><LI
><P
>&#13;array of int, Site setting identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string, Site slice prefix					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_tag_id</I
></TT
>
: int, Site setting identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Site setting value					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSites"
>GetSites</A
></H2
><P
>Prototype:<A
NAME="AEN9411"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSites (auth, site_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9414"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about sites. If
site_filter is specified and is an array of site identifiers or
hostnames, or a struct of site attributes, only sites matching the
filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9417"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier							</P
></LI
><LI
><P
>&#13;string, Site slice prefix							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, login_base					</P
></LI
><LI
><P
>&#13;int, site_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when site entry was last updated, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when site entry was last updated, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of site node identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of site node identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier									</P
></LI
><LI
><P
>&#13;array of int, Site identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCU identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCU identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>max_slices</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Maximum number of slices that the site is able to create									</P
></LI
><LI
><P
>&#13;array of int, Maximum number of slices that the site is able to create									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ext_consortium_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, external consortium id									</P
></LI
><LI
><P
>&#13;array of int, external consortium id									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign site identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign site identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>abbreviated_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Abbreviated site name									</P
></LI
><LI
><P
>&#13;array of string, Abbreviated site name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of account identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of account identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>latitude</I
></TT
>
: double or array of double							</P
><P
></P
><UL
><LI
><P
>&#13;double, Decimal latitude of the site									</P
></LI
><LI
><P
>&#13;array of double, Decimal latitude of the site									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this site belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this site belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>max_slivers</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Maximum number of slivers that the site is able to create									</P
></LI
><LI
><P
>&#13;array of int, Maximum number of slivers that the site is able to create									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>is_public</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Publicly viewable site									</P
></LI
><LI
><P
>&#13;array of boolean, Publicly viewable site									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>address_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of address identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of address identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Full site name									</P
></LI
><LI
><P
>&#13;array of string, Full site name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, URL of a page that describes the site									</P
></LI
><LI
><P
>&#13;array of string, URL of a page that describes the site									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this site									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this site									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Has been enabled									</P
></LI
><LI
><P
>&#13;array of boolean, Has been enabled									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>longitude</I
></TT
>
: double or array of double							</P
><P
></P
><UL
><LI
><P
>&#13;double, Decimal longitude of the site									</P
></LI
><LI
><P
>&#13;array of double, Decimal longitude of the site									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Site slice prefix									</P
></LI
><LI
><P
>&#13;array of string, Site slice prefix									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when site entry was created, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when site entry was created, in seconds since UNIX epoch									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when site entry was last updated, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of site node identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array, List of PCU identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slices</I
></TT
>
: int, Maximum number of slices that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ext_consortium_id</I
></TT
>
: int, external consortium id					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_site_id</I
></TT
>
: int, Foreign site identifier at peer					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>abbreviated_name</I
></TT
>
: string, Abbreviated site name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array, List of account identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array, List of slice identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>latitude</I
></TT
>
: double, Decimal latitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this site belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slivers</I
></TT
>
: int, Maximum number of slivers that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_public</I
></TT
>
: boolean, Publicly viewable site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>address_ids</I
></TT
>
: array, List of address identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Full site name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL of a page that describes the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_tag_ids</I
></TT
>
: array, List of tags attached to this site					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Has been enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>longitude</I
></TT
>
: double, Decimal longitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string, Site slice prefix					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int, Date and time when site entry was created, in seconds since UNIX epoch					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceArch"
>GetSliceArch</A
></H2
><P
>Prototype:<A
NAME="AEN9756"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceArch (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9759"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag arch</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9762"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceFamily"
>GetSliceFamily</A
></H2
><P
>Prototype:<A
NAME="AEN9793"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceFamily (auth, slice_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9796"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns the slice vserver reference image that a given slice
should be based on. This depends on the global PLC settings in the
PLC_FLAVOUR area, optionnally overridden by any of the 'vref',
'arch', 'pldistro', 'fcdistro' tag if set on the slice.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9799"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, the slicefamily this slice should be based upon			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceFcdistro"
>GetSliceFcdistro</A
></H2
><P
>Prototype:<A
NAME="AEN9825"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceFcdistro (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9828"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag fcdistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9831"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceHmac"
>GetSliceHmac</A
></H2
><P
>Prototype:<A
NAME="AEN9862"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceHmac (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9865"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag hmac</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9868"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceHrn"
>GetSliceHrn</A
></H2
><P
>Prototype:<A
NAME="AEN9899"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceHrn (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9902"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9905"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceInitscript"
>GetSliceInitscript</A
></H2
><P
>Prototype:<A
NAME="AEN9936"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceInitscript (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9939"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag initscript</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9942"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceInitscriptCode"
>GetSliceInitscriptCode</A
></H2
><P
>Prototype:<A
NAME="AEN9973"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceInitscriptCode (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN9976"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag initscript_code</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN9979"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceInstantiations"
>GetSliceInstantiations</A
></H2
><P
>Prototype:<A
NAME="AEN10010"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceInstantiations (auth)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10013"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of all valid slice instantiation states.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10016"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of string, Slice instantiation state			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceKeys"
>GetSliceKeys</A
></H2
><P
>Prototype:<A
NAME="AEN10034"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceKeys (auth, slice_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10037"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing public key info for users in
the specified slices. If slice_filter is specified and is an array
of slice identifiers or slice names, or a struct of slice
attributes, only slices matching the filter will be returned. If
return_fields is specified, only the specified details will be
returned.</P
><P
>Users may only query slices of which they are members. PIs may
query any of the slices at their sites. Admins and nodes may query
any slice. If a slice that cannot be queried is specified in
slice_filter, details about that slice will not be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10041"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>creator_person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of the account that created this slice									</P
></LI
><LI
><P
>&#13;array of int, Identifier of the account that created this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice instantiation state									</P
></LI
><LI
><P
>&#13;array of string, Slice instantiation state									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice description									</P
></LI
><LI
><P
>&#13;array of string, Slice description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of nodes in this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of nodes in this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, URL further describing this slice									</P
></LI
><LI
><P
>&#13;array of string, URL further describing this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>max_nodes</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Maximum number of nodes that can be assigned to this slice									</P
></LI
><LI
><P
>&#13;array of int, Maximum number of nodes that can be assigned to this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of accounts that can use this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of accounts that can use this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of the site to which this slice belongs									</P
></LI
><LI
><P
>&#13;array of int, Identifier of the site to which this slice belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when slice was created, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when slice was created, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign slice identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign slice identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice attributes									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice attributes									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this slice belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this slice belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice name									</P
></LI
><LI
><P
>&#13;array of string, Slice name									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int, User identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string, Primary e-mail address					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceOmfControl"
>GetSliceOmfControl</A
></H2
><P
>Prototype:<A
NAME="AEN10233"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceOmfControl (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10236"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag omf_control</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10239"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSlicePldistro"
>GetSlicePldistro</A
></H2
><P
>Prototype:<A
NAME="AEN10270"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSlicePldistro (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10273"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag pldistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10276"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceSliverHMAC"
>GetSliceSliverHMAC</A
></H2
><P
>Prototype:<A
NAME="AEN10307"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceSliverHMAC (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10310"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag enable_hmac</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10313"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceSshKey"
>GetSliceSshKey</A
></H2
><P
>Prototype:<A
NAME="AEN10344"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceSshKey (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10347"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag ssh_key</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10350"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceTags"
>GetSliceTags</A
></H2
><P
>Prototype:<A
NAME="AEN10381"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceTags (auth, slice_tag_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10384"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about slice and
sliver attributes. An attribute is a sliver attribute if the
node_id field is set. If slice_tag_filter is specified and
is an array of slice attribute identifiers, or a struct of slice
attribute attributes, only slice attributes matching the filter
will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>Users may only query attributes of slices or slivers of which they
are members. PIs may only query attributes of slices or slivers at
their sites, or of which they are members. Admins may query
attributes of any slice or sliver.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10388"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_tag_filter</I
></TT
>
: array of int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int, Slice tag identifier					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice attribute value									</P
></LI
><LI
><P
>&#13;array of string, Slice attribute value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier									</P
></LI
><LI
><P
>&#13;array of int, Node group identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_tag_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice tag identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice tag identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier									</P
></LI
><LI
><P
>&#13;array of int, Node identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice name									</P
></LI
><LI
><P
>&#13;array of string, Slice name									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_id</I
></TT
>
: int, Node group identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_tag_id</I
></TT
>
: int, Slice tag identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Slice attribute value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceTicket"
>GetSliceTicket</A
></H2
><P
>Prototype:<A
NAME="AEN10532"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceTicket (auth, slice_id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10535"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a ticket for, or signed representation of, the specified
slice. Slice tickets may be used to manually instantiate or update
a slice on a node. Present this ticket to the local Node Manager
interface to redeem it.</P
><P
>If the slice has not been added to a node with AddSliceToNodes,
and the ticket is redeemed on that node, it will be deleted the
next time the Node Manager contacts the API.</P
><P
>Users may only obtain tickets for slices of which they are
members. PIs may obtain tickets for any of the slices at their
sites, or any slices of which they are members. Admins may obtain
tickets for any slice.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10541"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, peer</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Signed slice ticket			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSliceVref"
>GetSliceVref</A
></H2
><P
>Prototype:<A
NAME="AEN10567"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSliceVref (auth, id_or_name)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10570"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'get' method designed for Slice objects using tag vref</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10573"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string or nil			</P
><P
></P
><UL
><LI
><P
>&#13;string, 					</P
></LI
><LI
><P
>&#13;nil, 					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSlices"
>GetSlices</A
></H2
><P
>Prototype:<A
NAME="AEN10604"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSlices (auth, slice_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10607"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about slices. If
slice_filter is specified and is an array of slice identifiers or
slice names, or a struct of slice attributes, only slices matching
the filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>Users may only query slices of which they are members. PIs may
query any of the slices at their sites. Admins and nodes may query
any slice. If a slice that cannot be queried is specified in
slice_filter, details about that slice will not be returned.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10611"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, name					</P
></LI
><LI
><P
>&#13;int, slice_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>creator_person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of the account that created this slice									</P
></LI
><LI
><P
>&#13;array of int, Identifier of the account that created this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice instantiation state									</P
></LI
><LI
><P
>&#13;array of string, Slice instantiation state									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice description									</P
></LI
><LI
><P
>&#13;array of string, Slice description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of nodes in this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of nodes in this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, URL further describing this slice									</P
></LI
><LI
><P
>&#13;array of string, URL further describing this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>max_nodes</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Maximum number of nodes that can be assigned to this slice									</P
></LI
><LI
><P
>&#13;array of int, Maximum number of nodes that can be assigned to this slice									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of accounts that can use this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of accounts that can use this slice									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Identifier of the site to which this slice belongs									</P
></LI
><LI
><P
>&#13;array of int, Identifier of the site to which this slice belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when slice was created, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when slice was created, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign slice identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign slice identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice attributes									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice attributes									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this slice belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this slice belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice name									</P
></LI
><LI
><P
>&#13;array of string, Slice name									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Slice description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of nodes in this slice					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, Date and time when slice expires, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Identifier of the site to which this slice belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>creator_person_id</I
></TT
>
: int, Identifier of the account that created this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string, Slice instantiation state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>created</I
></TT
>
: int, Date and time when slice was created, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL further describing this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_nodes</I
></TT
>
: int, Maximum number of nodes that can be assigned to this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_ids</I
></TT
>
: array, List of accounts that can use this slice					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_slice_id</I
></TT
>
: int, Foreign slice identifier at peer					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_tag_ids</I
></TT
>
: array, List of slice attributes					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this slice belongs					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetSlivers"
>GetSlivers</A
></H2
><P
>Prototype:<A
NAME="AEN10846"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetSlivers (auth, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN10849"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns a struct containing information about the specified node
(or calling node, if called by a node and node_id_or_hostname is
not specified), including the current set of slivers bound to the
node.</P
><P
>All of the information returned by this call can be gathered from
other calls, e.g. GetNodes, GetInterfaces, GetSlices, etc. This
function exists almost solely for the benefit of Node Manager.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN10853"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>xmpp</I
></TT
>
: struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, username for the XMPP server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>user</I
></TT
>
: string, username for the XMPP server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>server</I
></TT
>
: string, hostname for the XMPP server							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interfaces</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean, Is the primary interface for this node							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, (Optional) Hostname							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array, List of interface settings							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node associated with this interface							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int, Bandwidth limit							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string, Address type (e.g., 'ipv4')							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_files</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>postinstall_cmd</I
></TT
>
: string, Shell command to execute after installing							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>preinstall_cmd</I
></TT
>
: string, Shell command to execute prior to installing							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: int, List of nodes linked to this file							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>dest</I
></TT
>
: string, Absolute path where file should be installed							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ignore_cmd_errors</I
></TT
>
: boolean, Install file anyway even if an error occurs							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_permissions</I
></TT
>
: string, chmod(1) permissions							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>always_update</I
></TT
>
: boolean, Always attempt to install file even if unchanged							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_group</I
></TT
>
: string, chgrp(1) owner							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>file_owner</I
></TT
>
: string, chown(1) owner							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>error_cmd</I
></TT
>
: string, Shell command to execute if any error occurs							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: int, List of node groups linked to this file							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Configuration file is active							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>source</I
></TT
>
: string, Relative path on the boot server where file can be downloaded							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>accounts</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>keys</I
></TT
>
: array of struct							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string, Key type									</P
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, unix style account name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>groups</I
></TT
>
: array of string, Node group name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>leases</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>t_from</I
></TT
>
: int or string							</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)									</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>t_until</I
></TT
>
: int or string							</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)									</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>reservation_policy</I
></TT
>
: string, one among none, lease_or_idle, lease_or_shared					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slivers</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string, Slice instantiation state							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>keys</I
></TT
>
: array of struct							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string, Key type									</P
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, Date and time when slice expires, in seconds since UNIX epoch							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>attributes</I
></TT
>
: array of struct							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Slice attribute value									</P
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscripts</I
></TT
>
: array of struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>initscript_id</I
></TT
>
: int, Initscript identifier							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Initscript is active							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Initscript name							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>script</I
></TT
>
: string, Initscript							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>timestamp</I
></TT
>
: int, Timestamp of this call, in seconds since UNIX epoch					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetTagTypes"
>GetTagTypes</A
></H2
><P
>Prototype:<A
NAME="AEN11104"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetTagTypes (auth, tag_type_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN11107"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about
node tag types.</P
><P
>The usual filtering scheme applies on this method.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN11111"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_filter</I
></TT
>
: array of int or string or int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier							</P
></LI
><LI
><P
>&#13;string, Node tag type name							</P
></LI
></UL
></LI
><LI
><P
>&#13;int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier							</P
></LI
><LI
><P
>&#13;string, Node tag type name							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag category									</P
></LI
><LI
><P
>&#13;array of string, Node tag category									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type description									</P
></LI
><LI
><P
>&#13;array of string, Node tag type description									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node tag type name									</P
></LI
><LI
><P
>&#13;array of string, Node tag type name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier									</P
></LI
><LI
><P
>&#13;array of int, Node tag type identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array, List of role identifiers					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array, List of roles					</P
><P
></P
><UL
><LI
><P
>&#13;string							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tag_type_id</I
></TT
>
: int, Node tag type identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="GetWhitelist"
>GetWhitelist</A
></H2
><P
>Prototype:<A
NAME="AEN11241"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>GetWhitelist (auth, node_filter, return_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN11244"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of structs containing details about the specified nodes
whitelists. If node_filter is specified and is an array of node identifiers or
hostnames, or a struct of node attributes, only nodes matching the
filter will be returned. If return_fields is specified, only the
specified details will be returned.</P
><P
>Some fields may only be viewed by admins.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN11248"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, node, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier							</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node key									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Boot state									</P
></LI
><LI
><P
>&#13;array of string, Boot state									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Site at which this node is located									</P
></LI
><LI
><P
>&#13;array of int, Site at which this node is located									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCUs that control this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCUs that control this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Node type									</P
></LI
><LI
><P
>&#13;array of string, Node type									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node session value									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node session value									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Last known SSH host key									</P
></LI
><LI
><P
>&#13;array of string, Last known SSH host key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_pcu_reboot</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was attempted									</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was attempted									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verified</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Whether the node configuration is verified correct									</P
></LI
><LI
><P
>&#13;array of boolean, Whether the node configuration is verified correct									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_contact</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last contacted plc									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last contacted plc									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign node identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign node identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Fully qualified hostname									</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Run level									</P
></LI
><LI
><P
>&#13;array of string, Run level									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_time_spent_offline</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last offline after failure and before reboot									</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last offline after failure and before reboot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Apparent Boot CD version									</P
></LI
><LI
><P
>&#13;array of string, Apparent Boot CD version									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this node belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this node belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier									</P
></LI
><LI
><P
>&#13;array of int, Node identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_boot</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last booted									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last booted									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>interface_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of network interfaces that this node has									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of network interfaces that this node has									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of configuration files specific to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of configuration files specific to this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_pcu_confirmation</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was confirmed									</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was confirmed									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of node groups that this node is in									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of node groups that this node is in									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids_whitelist</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices allowed on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices allowed on this node									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_time_spent_online</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last online before shutdown/failure									</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last online before shutdown/failure									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Random value generated by the node at last boot									</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Random value generated by the node at last boot									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_download</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node boot image was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node boot image was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Make and model of the actual machine									</P
></LI
><LI
><P
>&#13;array of string, Make and model of the actual machine									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCU ports that this node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCU ports that this node is connected to									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>return_fields</I
></TT
>
: array, List of fields to return			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, (Admin only) Node key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, (Admin only) Node session value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site at which this node is located					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array, List of PCUs that control this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string, Node type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_boot</I
></TT
>
: int, Date and time when node last booted					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_ids</I
></TT
>
: array, List of network interfaces that this node has					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids_whitelist</I
></TT
>
: array, List of slices allowed on this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string, Run level					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string, Last known SSH host key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_reboot</I
></TT
>
: int, Date and time when PCU reboot was attempted					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_tag_ids</I
></TT
>
: array, List of tags attached to this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: array, List of node groups that this node is in					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>verified</I
></TT
>
: boolean, Whether the node configuration is verified correct					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_contact</I
></TT
>
: int, Date and time when node last contacted plc					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_node_id</I
></TT
>
: int, Foreign node identifier at peer					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_offline</I
></TT
>
: int, Length of time the node was last offline after failure and before reboot					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array, List of configuration files specific to this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_online</I
></TT
>
: int, Length of time the node was last online before shutdown/failure					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array, List of slices on this node					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string, (Admin only) Random value generated by the node at last boot					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string, Apparent Boot CD version					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_confirmation</I
></TT
>
: int, Date and time when PCU reboot was confirmed					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_download</I
></TT
>
: int, Date and time when node boot image was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, Make and model of the actual machine					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int, Peer to which this node belongs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array, List of PCU ports that this node is connected to					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="NotifyPersons"
>NotifyPersons</A
></H2
><P
>Prototype:<A
NAME="AEN11711"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>NotifyPersons (auth, person_filter, subject, body)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN11714"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sends an e-mail message to the specified users. If person_filter
is specified and is an array of user identifiers or usernames, or
a struct of user attributes, only users matching the filter will
receive the message.</P
><P
>Returns 1 if successful.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN11718"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_filter</I
></TT
>
: array of int or string or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier							</P
></LI
><LI
><P
>&#13;string, Primary e-mail address							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of role identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time of last update									</P
></LI
><LI
><P
>&#13;array of int, Date and time of last update									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Surname									</P
></LI
><LI
><P
>&#13;array of string, Surname									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of site identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of site identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Given name									</P
></LI
><LI
><P
>&#13;array of string, Given name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Title									</P
></LI
><LI
><P
>&#13;array of string, Title									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier									</P
></LI
><LI
><P
>&#13;array of int, User identifier									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this user belongs									</P
></LI
><LI
><P
>&#13;array of int, Peer to which this user belongs									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Primary e-mail address									</P
></LI
><LI
><P
>&#13;array of string, Primary e-mail address									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Biography									</P
></LI
><LI
><P
>&#13;array of string, Biography									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of key identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of key identifiers									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Telephone number									</P
></LI
><LI
><P
>&#13;array of string, Telephone number									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>peer_person_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign user identifier at peer									</P
></LI
><LI
><P
>&#13;array of int, Foreign user identifier at peer									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>person_tag_ids</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this person									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this person									</P
><P
></P
><UL
><LI
><P
>&#13;int											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Account password in crypt() form									</P
></LI
><LI
><P
>&#13;array of string, Account password in crypt() form									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array or array of array							</P
><P
></P
><UL
><LI
><P
>&#13;array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of roles									</P
><P
></P
><UL
><LI
><P
>&#13;string											</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Home page									</P
></LI
><LI
><P
>&#13;array of string, Home page									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verification_key</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Reset password key									</P
></LI
><LI
><P
>&#13;array of string, Reset password key									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean							</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Has been enabled									</P
></LI
><LI
><P
>&#13;array of boolean, Has been enabled									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when account was created									</P
></LI
><LI
><P
>&#13;array of int, Date and time when account was created									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>verification_expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when verification_key expires									</P
></LI
><LI
><P
>&#13;array of int, Date and time when verification_key expires									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>subject</I
></TT
>
: string, E-mail subject			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>body</I
></TT
>
: string, E-mail body			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="NotifySupport"
>NotifySupport</A
></H2
><P
>Prototype:<A
NAME="AEN11968"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>NotifySupport (auth, subject, body)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN11971"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sends an e-mail message to the configured support address.</P
><P
>Returns 1 if successful.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN11975"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>subject</I
></TT
>
: string, E-mail subject			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>body</I
></TT
>
: string, E-mail body			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="RebootNode"
>RebootNode</A
></H2
><P
>Prototype:<A
NAME="AEN11999"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>RebootNode (auth, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12002"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Sends the specified node a specially formatted UDP packet which
should cause it to reboot immediately.</P
><P
>Admins can reboot any node. Techs and PIs can only reboot nodes at
their site.</P
><P
>Returns 1 if the packet was successfully sent (which only whether
the packet was sent, not whether the reboot was successful).</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12007"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="RebootNodeWithPCU"
>RebootNodeWithPCU</A
></H2
><P
>Prototype:<A
NAME="AEN12033"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>RebootNodeWithPCU (auth, node_id_or_hostname, testrun)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12036"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Uses the associated PCU to attempt to reboot the given Node.</P
><P
>Admins can reboot any node. Techs and PIs can only reboot nodes at
their site.</P
><P
>Returns 1 if the reboot proceeded without error (Note: this does not guarantee
that the reboot is successful).
Returns -1 if external dependencies for this call are not available.
Returns "error string" if the reboot failed with a specific message.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12041"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>testrun</I
></TT
>
: boolean, Run as a test, or as a real reboot			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="RefreshPeer"
>RefreshPeer</A
></H2
><P
>Prototype:<A
NAME="AEN12070"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>RefreshPeer (auth, peer_id_or_peername)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12073"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Fetches site, node, slice, person and key data from the specified peer
and caches it locally; also deletes stale entries.
Upon successful completion, returns a dict reporting various timers.
Faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12076"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_id_or_peername</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer identifier					</P
></LI
><LI
><P
>&#13;string, Peer name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="ReportRunlevel"
>ReportRunlevel</A
></H2
><P
>Prototype:<A
NAME="AEN12102"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>ReportRunlevel (auth, report_fields, node_id_or_hostname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12105"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>report runlevel</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12108"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>node, admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct or struct or struct			</P
><P
></P
><UL
><LI
><P
>&#13;struct, API authentication structure					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'hmac'							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, HMAC of node key and method call							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int, Node identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, API authentication structure					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, Session key							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use, always 'session'							</P
></LI
></UL
></LI
><LI
><P
>&#13;struct, API authentication structure					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use							</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>report_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string, Run level					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="ResetPassword"
>ResetPassword</A
></H2
><P
>Prototype:<A
NAME="AEN12165"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>ResetPassword (auth, person_id_or_email, verification_key, verification_expires)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12168"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>If verification_key is not specified, then a new verification_key
will be generated and stored with the user's account. The key will
be e-mailed to the user in the form of a link to a web page.</P
><P
>The web page should verify the key by calling this function again
and specifying verification_key. If the key matches what has been
stored in the user's account, a new random password will be
e-mailed to the user.</P
><P
>Returns 1 if verification_key was not specified, or was specified
and is valid, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12173"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>verification_key</I
></TT
>
: string, Reset password key			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>verification_expires</I
></TT
>
: int, Date and time when verification_key expires			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if verification_key is valid			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="ResolveSlices"
>ResolveSlices</A
></H2
><P
>Prototype:<A
NAME="AEN12205"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>ResolveSlices (auth, slice_filter)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12208"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method is similar to GetSlices, except that (1) the returned
columns are restricted to 'name', 'slice_id' and 'expires', and
(2) it returns expired slices too. This method is designed to help
third-party software solve slice names from their slice_id
(e.g. CeniFlow Central). For this reason it is accessible with
anonymous authentication (among others).</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12211"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_filter</I
></TT
>
: array of int or string or string or int or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
><LI
><P
>&#13;string, name					</P
></LI
><LI
><P
>&#13;int, slice_id					</P
></LI
><LI
><P
>&#13;struct, Attribute filter					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
><LI
><P
>&#13;array of int, Date and time when slice expires, in seconds since UNIX epoch									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string or array of string							</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice name									</P
></LI
><LI
><P
>&#13;array of string, Slice name									</P
></LI
></UL
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int or array of int							</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier									</P
></LI
><LI
><P
>&#13;array of int, Slice identifier									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, Date and time when slice expires, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Slice name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_id</I
></TT
>
: int, Slice identifier					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="RetrieveSlicePersonKeys"
>RetrieveSlicePersonKeys</A
></H2
><P
>Prototype:<A
NAME="AEN12281"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>RetrieveSlicePersonKeys (auth, slice_id_or_name, person_filter)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12284"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method exposes the public ssh keys for people in a slice
It expects a slice name or id, and returns a dictionary on emails.
This method is designed to help third-party software authenticate
users (e.g. the OMF Experiment Controller).
For this reason it is accessible with anonymous authentication.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12287"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_filter</I
></TT
>
: struct, Attribute filter			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>role_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of role identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of role identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time of last update							</P
></LI
><LI
><P
>&#13;array of int, Date and time of last update							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Surname							</P
></LI
><LI
><P
>&#13;array of string, Surname							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of site identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of site identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Given name							</P
></LI
><LI
><P
>&#13;array of string, Given name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Title							</P
></LI
><LI
><P
>&#13;array of string, Title							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slice identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slice identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier							</P
></LI
><LI
><P
>&#13;array of int, User identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this user belongs							</P
></LI
><LI
><P
>&#13;array of int, Peer to which this user belongs							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Primary e-mail address							</P
></LI
><LI
><P
>&#13;array of string, Primary e-mail address							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Biography							</P
></LI
><LI
><P
>&#13;array of string, Biography							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of key identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of key identifiers							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Telephone number							</P
></LI
><LI
><P
>&#13;array of string, Telephone number							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_person_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign user identifier at peer							</P
></LI
><LI
><P
>&#13;array of int, Foreign user identifier at peer							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>person_tag_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this person							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this person							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Account password in crypt() form							</P
></LI
><LI
><P
>&#13;array of string, Account password in crypt() form							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of roles							</P
><P
></P
><UL
><LI
><P
>&#13;string									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of roles							</P
><P
></P
><UL
><LI
><P
>&#13;string									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Home page							</P
></LI
><LI
><P
>&#13;array of string, Home page							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>verification_key</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Reset password key							</P
></LI
><LI
><P
>&#13;array of string, Reset password key							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean or array of boolean					</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Has been enabled							</P
></LI
><LI
><P
>&#13;array of boolean, Has been enabled							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when account was created							</P
></LI
><LI
><P
>&#13;array of int, Date and time when account was created							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>verification_expires</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when verification_key expires							</P
></LI
><LI
><P
>&#13;array of int, Date and time when verification_key expires							</P
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct,  ssh keys hashed on emails			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="RetrieveSliceSliverKeys"
>RetrieveSliceSliverKeys</A
></H2
><P
>Prototype:<A
NAME="AEN12529"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>RetrieveSliceSliverKeys (auth, slice_id_or_name, node_filter)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12532"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method exposes the public ssh keys for a slice's slivers.
It expects a slice name or id, and returns a dictionary on hostnames.
This method is designed to help third-party software authenticate
slivers (e.g. the OMF Experiment Controller).
For this reason it is accessible with anonymous authentication.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12535"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech, anonymous</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_filter</I
></TT
>
: struct, Attribute filter			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created							</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node key							</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node key							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Boot state							</P
></LI
><LI
><P
>&#13;array of string, Boot state							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Site at which this node is located							</P
></LI
><LI
><P
>&#13;array of int, Site at which this node is located							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCUs that control this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCUs that control this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Node type							</P
></LI
><LI
><P
>&#13;array of string, Node type							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Node session value							</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Node session value							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ssh_rsa_key</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Last known SSH host key							</P
></LI
><LI
><P
>&#13;array of string, Last known SSH host key							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_reboot</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was attempted							</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was attempted							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_tag_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of tags attached to this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of tags attached to this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>verified</I
></TT
>
: boolean or array of boolean					</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Whether the node configuration is verified correct							</P
></LI
><LI
><P
>&#13;array of boolean, Whether the node configuration is verified correct							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_contact</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last contacted plc							</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last contacted plc							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_node_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign node identifier at peer							</P
></LI
><LI
><P
>&#13;array of int, Foreign node identifier at peer							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Fully qualified hostname							</P
></LI
><LI
><P
>&#13;array of string, Fully qualified hostname							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>run_level</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Run level							</P
></LI
><LI
><P
>&#13;array of string, Run level							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices on this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices on this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_offline</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last offline after failure and before reboot							</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last offline after failure and before reboot							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Apparent Boot CD version							</P
></LI
><LI
><P
>&#13;array of string, Apparent Boot CD version							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this node belongs							</P
></LI
><LI
><P
>&#13;array of int, Peer to which this node belongs							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier							</P
></LI
><LI
><P
>&#13;array of int, Node identifier							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_boot</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node last booted							</P
></LI
><LI
><P
>&#13;array of int, Date and time when node last booted							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of network interfaces that this node has							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of network interfaces that this node has							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_file_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of configuration files specific to this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of configuration files specific to this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_pcu_confirmation</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when PCU reboot was confirmed							</P
></LI
><LI
><P
>&#13;array of int, Date and time when PCU reboot was confirmed							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodegroup_ids</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of node groups that this node is in							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of node groups that this node is in							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slice_ids_whitelist</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of slices allowed on this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of slices allowed on this node							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_time_spent_online</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Length of time the node was last online before shutdown/failure							</P
></LI
><LI
><P
>&#13;array of int, Length of time the node was last online before shutdown/failure							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, (Admin only) Random value generated by the node at last boot							</P
></LI
><LI
><P
>&#13;array of string, (Admin only) Random value generated by the node at last boot							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_download</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node boot image was created							</P
></LI
><LI
><P
>&#13;array of int, Date and time when node boot image was created							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>date_created</I
></TT
>
: int or array of int					</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created							</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string or array of string					</P
><P
></P
><UL
><LI
><P
>&#13;string, Make and model of the actual machine							</P
></LI
><LI
><P
>&#13;array of string, Make and model of the actual machine							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array or array of array					</P
><P
></P
><UL
><LI
><P
>&#13;array, List of PCU ports that this node is connected to							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of PCU ports that this node is connected to							</P
><P
></P
><UL
><LI
><P
>&#13;int									</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct,  ssh keys hashed on hostnames			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceAlias"
>SetInterfaceAlias</A
></H2
><P
>Prototype:<A
NAME="AEN12869"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceAlias (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12872"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag alias</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12875"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceBackdoor"
>SetInterfaceBackdoor</A
></H2
><P
>Prototype:<A
NAME="AEN12904"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceBackdoor (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12907"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag backdoor</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12910"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceChannel"
>SetInterfaceChannel</A
></H2
><P
>Prototype:<A
NAME="AEN12939"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceChannel (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12942"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag channel</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12945"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceDriver"
>SetInterfaceDriver</A
></H2
><P
>Prototype:<A
NAME="AEN12974"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceDriver (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN12977"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag driver</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN12980"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceEssid"
>SetInterfaceEssid</A
></H2
><P
>Prototype:<A
NAME="AEN13009"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceEssid (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13012"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag essid</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13015"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceFreq"
>SetInterfaceFreq</A
></H2
><P
>Prototype:<A
NAME="AEN13044"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceFreq (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13047"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag freq</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13050"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceIfname"
>SetInterfaceIfname</A
></H2
><P
>Prototype:<A
NAME="AEN13079"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceIfname (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13082"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag ifname</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13085"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceIwconfig"
>SetInterfaceIwconfig</A
></H2
><P
>Prototype:<A
NAME="AEN13114"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceIwconfig (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13117"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag iwconfig</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13120"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceIwpriv"
>SetInterfaceIwpriv</A
></H2
><P
>Prototype:<A
NAME="AEN13149"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceIwpriv (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13152"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag iwpriv</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13155"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceKey"
>SetInterfaceKey</A
></H2
><P
>Prototype:<A
NAME="AEN13184"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceKey (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13187"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag key</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13190"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceKey1"
>SetInterfaceKey1</A
></H2
><P
>Prototype:<A
NAME="AEN13219"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceKey1 (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13222"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag key1</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13225"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceKey2"
>SetInterfaceKey2</A
></H2
><P
>Prototype:<A
NAME="AEN13254"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceKey2 (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13257"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag key2</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13260"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceKey3"
>SetInterfaceKey3</A
></H2
><P
>Prototype:<A
NAME="AEN13289"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceKey3 (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13292"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag key3</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13295"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceKey4"
>SetInterfaceKey4</A
></H2
><P
>Prototype:<A
NAME="AEN13324"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceKey4 (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13327"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag key4</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13330"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceMode"
>SetInterfaceMode</A
></H2
><P
>Prototype:<A
NAME="AEN13359"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceMode (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13362"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag mode</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13365"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceNw"
>SetInterfaceNw</A
></H2
><P
>Prototype:<A
NAME="AEN13394"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceNw (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13397"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag nw</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13400"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceRate"
>SetInterfaceRate</A
></H2
><P
>Prototype:<A
NAME="AEN13429"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceRate (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13432"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag rate</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13435"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceSecurityMode"
>SetInterfaceSecurityMode</A
></H2
><P
>Prototype:<A
NAME="AEN13464"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceSecurityMode (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13467"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag securitymode</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13470"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetInterfaceSens"
>SetInterfaceSens</A
></H2
><P
>Prototype:<A
NAME="AEN13499"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetInterfaceSens (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13502"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Interface objects using tag sens</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13505"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier					</P
></LI
><LI
><P
>&#13;string, IP address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeArch"
>SetNodeArch</A
></H2
><P
>Prototype:<A
NAME="AEN13534"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeArch (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13537"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag arch</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13540"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeCramfs"
>SetNodeCramfs</A
></H2
><P
>Prototype:<A
NAME="AEN13569"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeCramfs (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13572"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag cramfs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13575"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeDeployment"
>SetNodeDeployment</A
></H2
><P
>Prototype:<A
NAME="AEN13604"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeDeployment (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13607"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag deployment</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13610"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeExtensions"
>SetNodeExtensions</A
></H2
><P
>Prototype:<A
NAME="AEN13639"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeExtensions (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13642"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag extensions</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13645"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeFcdistro"
>SetNodeFcdistro</A
></H2
><P
>Prototype:<A
NAME="AEN13674"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeFcdistro (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13677"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag fcdistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13680"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeHrn"
>SetNodeHrn</A
></H2
><P
>Prototype:<A
NAME="AEN13709"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeHrn (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13712"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13715"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeKargs"
>SetNodeKargs</A
></H2
><P
>Prototype:<A
NAME="AEN13744"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeKargs (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13747"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag kargs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13750"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeKvariant"
>SetNodeKvariant</A
></H2
><P
>Prototype:<A
NAME="AEN13779"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeKvariant (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13782"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag kvariant</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13785"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeNoHangcheck"
>SetNodeNoHangcheck</A
></H2
><P
>Prototype:<A
NAME="AEN13814"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeNoHangcheck (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13817"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag no-hangcheck</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13820"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodePlainBootstrapfs"
>SetNodePlainBootstrapfs</A
></H2
><P
>Prototype:<A
NAME="AEN13849"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodePlainBootstrapfs (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13852"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag plain-bootstrapfs</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13855"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodePldistro"
>SetNodePldistro</A
></H2
><P
>Prototype:<A
NAME="AEN13884"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodePldistro (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13887"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag pldistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13890"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeSerial"
>SetNodeSerial</A
></H2
><P
>Prototype:<A
NAME="AEN13919"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeSerial (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13922"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag serial</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13925"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetNodeVirt"
>SetNodeVirt</A
></H2
><P
>Prototype:<A
NAME="AEN13954"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetNodeVirt (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13957"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Node objects using tag virt</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13960"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetPersonAdvanced"
>SetPersonAdvanced</A
></H2
><P
>Prototype:<A
NAME="AEN13989"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetPersonAdvanced (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN13992"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Person objects using tag advanced</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN13995"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetPersonColumnconf"
>SetPersonColumnconf</A
></H2
><P
>Prototype:<A
NAME="AEN14024"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetPersonColumnconf (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14027"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Person objects using tag columnconf</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14030"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetPersonHrn"
>SetPersonHrn</A
></H2
><P
>Prototype:<A
NAME="AEN14059"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetPersonHrn (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14062"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Person objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14065"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetPersonPrimarySite"
>SetPersonPrimarySite</A
></H2
><P
>Prototype:<A
NAME="AEN14094"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetPersonPrimarySite (auth, person_id_or_email, site_id_or_login_base)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14097"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Makes the specified site the person's primary site. The person
must already be a member of the site.</P
><P
>Admins may update anyone. All others may only update themselves.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14101"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetPersonShowconf"
>SetPersonShowconf</A
></H2
><P
>Prototype:<A
NAME="AEN14135"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetPersonShowconf (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14138"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Person objects using tag showconf</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14141"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceArch"
>SetSliceArch</A
></H2
><P
>Prototype:<A
NAME="AEN14170"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceArch (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14173"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag arch</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14176"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceFcdistro"
>SetSliceFcdistro</A
></H2
><P
>Prototype:<A
NAME="AEN14205"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceFcdistro (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14208"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag fcdistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14211"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceHmac"
>SetSliceHmac</A
></H2
><P
>Prototype:<A
NAME="AEN14240"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceHmac (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14243"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag hmac</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14246"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceHrn"
>SetSliceHrn</A
></H2
><P
>Prototype:<A
NAME="AEN14275"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceHrn (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14278"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag hrn</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14281"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceInitscript"
>SetSliceInitscript</A
></H2
><P
>Prototype:<A
NAME="AEN14310"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceInitscript (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14313"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag initscript</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14316"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceInitscriptCode"
>SetSliceInitscriptCode</A
></H2
><P
>Prototype:<A
NAME="AEN14345"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceInitscriptCode (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14348"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag initscript_code</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14351"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceOmfControl"
>SetSliceOmfControl</A
></H2
><P
>Prototype:<A
NAME="AEN14380"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceOmfControl (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14383"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag omf_control</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14386"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSlicePldistro"
>SetSlicePldistro</A
></H2
><P
>Prototype:<A
NAME="AEN14415"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSlicePldistro (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14418"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag pldistro</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14421"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceSliverHMAC"
>SetSliceSliverHMAC</A
></H2
><P
>Prototype:<A
NAME="AEN14450"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceSliverHMAC (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14453"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag enable_hmac</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14456"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceSshKey"
>SetSliceSshKey</A
></H2
><P
>Prototype:<A
NAME="AEN14485"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceSshKey (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14488"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag ssh_key</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14491"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="SetSliceVref"
>SetSliceVref</A
></H2
><P
>Prototype:<A
NAME="AEN14520"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>SetSliceVref (auth, id_or_name, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14523"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Accessor 'set' method designed for Slice objects using tag vref</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14526"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, New tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;nil, 			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UnBindObjectFromPeer"
>UnBindObjectFromPeer</A
></H2
><P
>Prototype:<A
NAME="AEN14555"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UnBindObjectFromPeer (auth, object_type, object_id, shortname)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14558"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method is a hopefully temporary hack to let the sfa correctly
detach the objects it creates from a remote peer object. This is
needed so that the sfa federation link can work in parallel with
RefreshPeer, as RefreshPeer depends on remote objects being
correctly marked.</P
><P
>UnBindObjectFromPeer is allowed to admins only.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14562"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>object_type</I
></TT
>
: string, Object type, among 'site','person','slice','node','key'			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>object_id</I
></TT
>
: int, object_id			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string, peer shortname			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateAddress"
>UpdateAddress</A
></H2
><P
>Prototype:<A
NAME="AEN14589"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateAddress (auth, address_id, address_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14592"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing address with the values in
address_fields.</P
><P
>PIs may only update addresses of their own sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14597"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int, Address identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>city</I
></TT
>
: string, City					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>country</I
></TT
>
: string, Country					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line3</I
></TT
>
: string, Address line 3					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line2</I
></TT
>
: string, Address line 2					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>line1</I
></TT
>
: string, Address line 1					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>state</I
></TT
>
: string, State or province					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postalcode</I
></TT
>
: string, Postal code					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateAddressType"
>UpdateAddressType</A
></H2
><P
>Prototype:<A
NAME="AEN14643"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateAddressType (auth, address_type_id_or_name, address_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14646"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing address type with the values
in address_type_fields.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14650"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Address type identifier					</P
></LI
><LI
><P
>&#13;string, Address type					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>address_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Address type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Address type description					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateConfFile"
>UpdateConfFile</A
></H2
><P
>Prototype:<A
NAME="AEN14686"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateConfFile (auth, conf_file_id, conf_file_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14689"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a node configuration file. Only the fields specified in
conf_file_fields are updated, all other fields are left untouched.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14693"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_id</I
></TT
>
: int, Configuration file identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>conf_file_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_owner</I
></TT
>
: string, chown(1) owner					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>postinstall_cmd</I
></TT
>
: string, Shell command to execute after installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>error_cmd</I
></TT
>
: string, Shell command to execute if any error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>preinstall_cmd</I
></TT
>
: string, Shell command to execute prior to installing					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dest</I
></TT
>
: string, Absolute path where file should be installed					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ignore_cmd_errors</I
></TT
>
: boolean, Install file anyway even if an error occurs					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Configuration file is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_permissions</I
></TT
>
: string, chmod(1) permissions					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>source</I
></TT
>
: string, Relative path on the boot server where file can be downloaded					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>always_update</I
></TT
>
: boolean, Always attempt to install file even if unchanged					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>file_group</I
></TT
>
: string, chgrp(1) owner					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateIlink"
>UpdateIlink</A
></H2
><P
>Prototype:<A
NAME="AEN14751"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateIlink (auth, ilink_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14754"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing ilink</P
><P
>Access rights depend on the tag type.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14759"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>ilink_id</I
></TT
>
: int, ilink identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, optional ilink value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateInitScript"
>UpdateInitScript</A
></H2
><P
>Prototype:<A
NAME="AEN14783"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateInitScript (auth, initscript_id, initscript_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14786"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates an initscript. Only the fields specified in
initscript_fields are updated, all other fields are left untouched.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14790"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>initscript_id</I
></TT
>
: int, Initscript identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>initscript_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Initscript is active					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Initscript name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>script</I
></TT
>
: string, Initscript					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateInterface"
>UpdateInterface</A
></H2
><P
>Prototype:<A
NAME="AEN14824"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateInterface (auth, interface_id, interface_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14827"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates an existing interface network. Any values specified in
interface_fields are used, otherwise defaults are
used. Acceptable values for method are dhcp and static. If type is
static, then ip, gateway, network, broadcast, netmask, and dns1
must all be specified in interface_fields. If type is dhcp,
these parameters, even if specified, are ignored.</P
><P
>PIs and techs may only update interfaces associated with their own
nodes. Admins may update any interface network.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14832"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int, Node interface identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string, Subnet address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean, Is the primary interface for this node					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string, IP address of primary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, (Optional) Hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string, MAC address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array, List of interface settings					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int, Bandwidth limit					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string, Network broadcast address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Addressing method (e.g., 'static' or 'dhcp')					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string, Subnet mask					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string, IP address of secondary DNS server					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ifname</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string, Address type (e.g., 'ipv4')					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string, IP address of primary gateway					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateInterfaceTag"
>UpdateInterfaceTag</A
></H2
><P
>Prototype:<A
NAME="AEN14908"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateInterfaceTag (auth, interface_tag_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14911"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing interface setting</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14916"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>interface_tag_id</I
></TT
>
: int, Interface setting identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Interface setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateKey"
>UpdateKey</A
></H2
><P
>Prototype:<A
NAME="AEN14940"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateKey (auth, key_id, key_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14943"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing key with the values in
key_fields.</P
><P
>Non-admins may only update their own keys.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14948"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int, Key identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>key_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string, Key type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Key value					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateLeases"
>UpdateLeases</A
></H2
><P
>Prototype:<A
NAME="AEN14979"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateLeases (auth, lease_ids, input_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN14982"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of a (set of) existing lease(s) with the values in
lease_fields; specifically this applies to the timeslot definition.
As a convenience you may, in addition to the t_from and t_until fields,
you can also set the 'duration' field.</P
><P
>Users may only update leases attached to their slices.
PIs may update any of the leases for slices at their sites, or any
slices of which they are members. Admins may update any lease.</P
><P
>Returns a dict of successfully updated lease_ids and error messages.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN14987"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>lease_ids</I
></TT
>
: int or array of int			</P
><P
></P
><UL
><LI
><P
>&#13;int, Lease identifier					</P
></LI
><LI
><P
>&#13;array of int, Lease identifier					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>input_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>duration</I
></TT
>
: int, duration in seconds					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>t_from</I
></TT
>
: int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot start (unix timestamp)							</P
></LI
><LI
><P
>&#13;string, timeslot start (formatted as %Y-%m-%d %H:%M:%S)							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>t_until</I
></TT
>
: int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, timeslot end (unix timestamp)							</P
></LI
><LI
><P
>&#13;string, timeslot end (formatted as %Y-%m-%d %H:%M:%S)							</P
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;struct,  'updated_ids' is the list ids updated, 'errors' is a list of error strings			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateMessage"
>UpdateMessage</A
></H2
><P
>Prototype:<A
NAME="AEN15036"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateMessage (auth, message_id, message_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15039"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing message template with the
values in message_fields.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15043"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_id</I
></TT
>
: string, Message identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>message_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Message is enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>template</I
></TT
>
: string, Message template					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateNode"
>UpdateNode</A
></H2
><P
>Prototype:<A
NAME="AEN15074"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateNode (auth, node_id_or_hostname, node_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15077"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a node. Only the fields specified in node_fields are
updated, all other fields are left untouched.</P
><P
>PIs and techs can update only the nodes at their sites. Only
admins can update the key, session, and boot_nonce fields.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15082"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_id_or_hostname</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier					</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fcdistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>version</I
></TT
>
: string, Apparent Boot CD version					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slices</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_state</I
></TT
>
: string, Boot state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>conf_files</I
></TT
>
: array of int, ConfFile identifier					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>interfaces</I
></TT
>
: array of int or struct					</P
><P
></P
><UL
><LI
><P
>&#13;int, Interface identifier							</P
></LI
><LI
><P
>&#13;struct, Attribute filter							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Date and time when node entry was created											</P
></LI
><LI
><P
>&#13;array of int, Date and time when node entry was created											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>network</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Subnet address											</P
></LI
><LI
><P
>&#13;array of string, Subnet address											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>is_primary</I
></TT
>
: boolean or array of boolean									</P
><P
></P
><UL
><LI
><P
>&#13;boolean, Is the primary interface for this node											</P
></LI
><LI
><P
>&#13;array of boolean, Is the primary interface for this node											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>dns1</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of primary DNS server											</P
></LI
><LI
><P
>&#13;array of string, IP address of primary DNS server											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, (Optional) Hostname											</P
></LI
><LI
><P
>&#13;array of string, (Optional) Hostname											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>mac</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, MAC address											</P
></LI
><LI
><P
>&#13;array of string, MAC address											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>interface_tag_ids</I
></TT
>
: array or array of array									</P
><P
></P
><UL
><LI
><P
>&#13;array, List of interface settings											</P
><P
></P
><UL
><LI
><P
>&#13;int													</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, List of interface settings											</P
><P
></P
><UL
><LI
><P
>&#13;int													</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>interface_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Node interface identifier											</P
></LI
><LI
><P
>&#13;array of int, Node interface identifier											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>broadcast</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Network broadcast address											</P
></LI
><LI
><P
>&#13;array of string, Network broadcast address											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Addressing method (e.g., 'static' or 'dhcp')											</P
></LI
><LI
><P
>&#13;array of string, Addressing method (e.g., 'static' or 'dhcp')											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>netmask</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Subnet mask											</P
></LI
><LI
><P
>&#13;array of string, Subnet mask											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>node_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Node associated with this interface											</P
></LI
><LI
><P
>&#13;array of int, Node associated with this interface											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>dns2</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of secondary DNS server											</P
></LI
><LI
><P
>&#13;array of string, IP address of secondary DNS server											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address											</P
></LI
><LI
><P
>&#13;array of string, IP address											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>bwlimit</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Bandwidth limit											</P
></LI
><LI
><P
>&#13;array of int, Bandwidth limit											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>type</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Address type (e.g., 'ipv4')											</P
></LI
><LI
><P
>&#13;array of string, Address type (e.g., 'ipv4')											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>gateway</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, IP address of primary gateway											</P
></LI
><LI
><P
>&#13;array of string, IP address of primary gateway											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, Fully qualified hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>site_id</I
></TT
>
: int, Site at which this node is located					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>boot_nonce</I
></TT
>
: string, (Admin only) Random value generated by the node at last boot					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_type</I
></TT
>
: string, Node type					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>session</I
></TT
>
: string, (Admin only) Node session value					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>extensions</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pldistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, (Admin only) Node key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>virt</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, Make and model of the actual machine					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>arch</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>deployment</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slices_whitelist</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateNodeGroup"
>UpdateNodeGroup</A
></H2
><P
>Prototype:<A
NAME="AEN15330"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateNodeGroup (auth, nodegroup_id_or_name, nodegroup_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15333"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a custom node group.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15337"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node group identifier					</P
></LI
><LI
><P
>&#13;string, Node group name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>nodegroup_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>groupname</I
></TT
>
: string, Node group name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, value that the nodegroup definition is based upon					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateNodeTag"
>UpdateNodeTag</A
></H2
><P
>Prototype:<A
NAME="AEN15373"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateNodeTag (auth, node_tag_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15376"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing node tag</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15381"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>node_tag_id</I
></TT
>
: int, Node tag identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Node tag value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePCU"
>UpdatePCU</A
></H2
><P
>Prototype:<A
NAME="AEN15405"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePCU (auth, pcu_id, pcu_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15408"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing PCU with the values in
pcu_fields.</P
><P
>Non-admins may only update PCUs at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15413"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_id</I
></TT
>
: int, PCU identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>username</I
></TT
>
: string, PCU username					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_updated</I
></TT
>
: int, Date and time when node entry was created					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>node_ids</I
></TT
>
: array, List of nodes that this PCU controls					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ip</I
></TT
>
: string, PCU IP address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>notes</I
></TT
>
: string, Miscellaneous notes					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hostname</I
></TT
>
: string, PCU hostname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, PCU protocol, e.g. ssh, https, telnet					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model string					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, PCU username					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ports</I
></TT
>
: array, List of the port numbers that each node is connected to					</P
><P
></P
><UL
><LI
><P
>&#13;int							</P
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePCUProtocolType"
>UpdatePCUProtocolType</A
></H2
><P
>Prototype:<A
NAME="AEN15474"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePCUProtocolType (auth, protocol_type_id, protocol_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15477"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a pcu protocol type. Only the fields specified in
port_typee_fields are updated, all other fields are left untouched.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15481"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>protocol_type_id</I
></TT
>
: int, PCU protocol type identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>protocol_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>supported</I
></TT
>
: boolean, Is the port/protocol supported by PLC					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>protocol</I
></TT
>
: string, Protocol					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>port</I
></TT
>
: int, PCU port					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU type identifier					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePCUType"
>UpdatePCUType</A
></H2
><P
>Prototype:<A
NAME="AEN15518"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePCUType (auth, pcu_type_id, pcu_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15521"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a PCU type. Only the fields specified in
pcu_typee_fields are updated, all other fields are left untouched.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15525"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_id</I
></TT
>
: int, PCU Type Identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>pcu_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>model</I
></TT
>
: string, PCU model					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, PCU full name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePeer"
>UpdatePeer</A
></H2
><P
>Prototype:<A
NAME="AEN15556"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePeer (auth, peer_id_or_name, peer_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15559"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a peer. Only the fields specified in peer_fields are
updated, all other fields are left untouched.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15563"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer identifier					</P
></LI
><LI
><P
>&#13;string, Peer name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>peer_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peername</I
></TT
>
: string, Peer name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>peer_url</I
></TT
>
: string, Peer API URL					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string, Peer GPG public key					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn_root</I
></TT
>
: string, Root of this peer in a hierarchical naming space					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>cacert</I
></TT
>
: string, Peer SSL public certificate					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>shortname</I
></TT
>
: string, Peer short name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePerson"
>UpdatePerson</A
></H2
><P
>Prototype:<A
NAME="AEN15611"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePerson (auth, person_id_or_email, person_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15614"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a person. Only the fields specified in person_fields are
updated, all other fields are left untouched.</P
><P
>Users and techs can only update themselves. PIs can only update
themselves and other non-PIs at their sites.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15619"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, tech</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>bio</I
></TT
>
: string, Biography					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>first_name</I
></TT
>
: string, Given name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>last_name</I
></TT
>
: string, Surname					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>keys</I
></TT
>
: array of int or struct					</P
><P
></P
><UL
><LI
><P
>&#13;int, Key identifier							</P
></LI
><LI
><P
>&#13;struct, Attribute filter							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>peer_key_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Foreign key identifier at peer											</P
></LI
><LI
><P
>&#13;array of int, Foreign key identifier at peer											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key_type</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Key type											</P
></LI
><LI
><P
>&#13;array of string, Key type											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Key value											</P
></LI
><LI
><P
>&#13;array of string, Key value											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>person_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, User to which this key belongs											</P
></LI
><LI
><P
>&#13;array of int, User to which this key belongs											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>key_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Key identifier											</P
></LI
><LI
><P
>&#13;array of int, Key identifier											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>peer_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Peer to which this key belongs											</P
></LI
><LI
><P
>&#13;array of int, Peer to which this key belongs											</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>roles</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Role identifier							</P
></LI
><LI
><P
>&#13;string, Role name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>title</I
></TT
>
: string, Title					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, Home page					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>slices</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier							</P
></LI
><LI
><P
>&#13;string, Slice name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Has been enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>sites</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier							</P
></LI
><LI
><P
>&#13;string, Site name							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>phone</I
></TT
>
: string, Telephone number					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>showconf</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>columnconf</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>password</I
></TT
>
: string, Account password in crypt() form					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>email</I
></TT
>
: string, Primary e-mail address					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>advanced</I
></TT
>
: string, accessor					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdatePersonTag"
>UpdatePersonTag</A
></H2
><P
>Prototype:<A
NAME="AEN15769"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdatePersonTag (auth, person_tag_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15772"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing person setting</P
><P
>Admins have full access.  Non-admins can change their own tags.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15777"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_tag_id</I
></TT
>
: int, Person setting identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Person setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateSite"
>UpdateSite</A
></H2
><P
>Prototype:<A
NAME="AEN15801"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateSite (auth, site_id_or_login_base, site_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15804"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates a site. Only the fields specified in update_fields are
updated, all other fields are left untouched.</P
><P
>PIs can only update sites they are a member of. Only admins can
update max_slices, max_slivers, and login_base.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15809"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_id_or_login_base</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Site identifier					</P
></LI
><LI
><P
>&#13;string, Site slice prefix					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>name</I
></TT
>
: string, Full site name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>persons</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Person identifier							</P
></LI
><LI
><P
>&#13;string, Email address							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL of a page that describes the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enabled</I
></TT
>
: boolean, Has been enabled					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>longitude</I
></TT
>
: double, Decimal longitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slivers</I
></TT
>
: int, Maximum number of slivers that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_slices</I
></TT
>
: int, Maximum number of slices that the site is able to create					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>login_base</I
></TT
>
: string, Site slice prefix					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>ext_consortium_id</I
></TT
>
: int, external consortium id					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>latitude</I
></TT
>
: double, Decimal latitude of the site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>is_public</I
></TT
>
: boolean, Publicly viewable site					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>abbreviated_name</I
></TT
>
: string, Abbreviated site name					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>addresses</I
></TT
>
: array of int or struct					</P
><P
></P
><UL
><LI
><P
>&#13;int, Address identifer							</P
></LI
><LI
><P
>&#13;struct, Attribute filter							</P
><P
></P
><UL
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>city</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, City											</P
></LI
><LI
><P
>&#13;array of string, City											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>address_id</I
></TT
>
: int or array of int									</P
><P
></P
><UL
><LI
><P
>&#13;int, Address identifier											</P
></LI
><LI
><P
>&#13;array of int, Address identifier											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>country</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Country											</P
></LI
><LI
><P
>&#13;array of string, Country											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>line3</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 3											</P
></LI
><LI
><P
>&#13;array of string, Address line 3											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>line2</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 2											</P
></LI
><LI
><P
>&#13;array of string, Address line 2											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>line1</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Address line 1											</P
></LI
><LI
><P
>&#13;array of string, Address line 1											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>address_type_ids</I
></TT
>
: array or array of array									</P
><P
></P
><UL
><LI
><P
>&#13;array, Address type identifiers											</P
><P
></P
><UL
><LI
><P
>&#13;int													</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, Address type identifiers											</P
><P
></P
><UL
><LI
><P
>&#13;int													</P
></LI
></UL
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>state</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, State or province											</P
></LI
><LI
><P
>&#13;array of string, State or province											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>postalcode</I
></TT
>
: string or array of string									</P
><P
></P
><UL
><LI
><P
>&#13;string, Postal code											</P
></LI
><LI
><P
>&#13;array of string, Postal code											</P
></LI
></UL
></LI
><LI
><P
>&#13;										<TT
CLASS="parameter"
><I
>address_types</I
></TT
>
: array or array of array									</P
><P
></P
><UL
><LI
><P
>&#13;array, Address types											</P
><P
></P
><UL
><LI
><P
>&#13;string													</P
></LI
></UL
></LI
><LI
><P
>&#13;array of array, Address types											</P
><P
></P
><UL
><LI
><P
>&#13;string													</P
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateSiteTag"
>UpdateSiteTag</A
></H2
><P
>Prototype:<A
NAME="AEN15981"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateSiteTag (auth, site_tag_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN15984"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing site setting</P
><P
>Admins have full access.  Non-admins need to
(1) have at least one of the roles attached to the tagtype,
and (2) belong in the same site as the tagged subject.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN15989"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, tech, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>site_tag_id</I
></TT
>
: int, Site setting identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string, Site setting value			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateSlice"
>UpdateSlice</A
></H2
><P
>Prototype:<A
NAME="AEN16013"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateSlice (auth, slice_id_or_name, slice_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16016"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing slice with the values in
slice_fields.</P
><P
>Users may only update slices of which they are members. PIs may
update any of the slices at their sites, or any slices of which
they are members. Admins may update any slice.</P
><P
>Only PIs and admins may update max_nodes. Slices cannot be renewed
(by updating the expires parameter) more than 8 weeks into the
future.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16022"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Slice identifier					</P
></LI
><LI
><P
>&#13;string, Slice name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>enable_hmac</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Slice description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscript</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>expires</I
></TT
>
: int, Date and time when slice expires, in seconds since UNIX epoch					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>persons</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Person identifier							</P
></LI
><LI
><P
>&#13;string, Email address							</P
></LI
></UL
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>pldistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>arch</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>vref</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>hrn</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>instantiation</I
></TT
>
: string, Slice instantiation state					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>fcdistro</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>url</I
></TT
>
: string, URL further describing this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>max_nodes</I
></TT
>
: int, Maximum number of nodes that can be assigned to this slice					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>initscript_code</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>omf_control</I
></TT
>
: string, accessor					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>nodes</I
></TT
>
: array of int or string					</P
><P
></P
><UL
><LI
><P
>&#13;int, Node identifier							</P
></LI
><LI
><P
>&#13;string, Fully qualified hostname							</P
></LI
></UL
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateSliceTag"
>UpdateSliceTag</A
></H2
><P
>Prototype:<A
NAME="AEN16110"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateSliceTag (auth, slice_tag_id, value)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16113"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the value of an existing slice or sliver attribute.</P
><P
>Users may only update attributes of slices or slivers of which
they are members. PIs may only update attributes of slices or
slivers at their sites, or of which they are members. Admins may
update attributes of any slice or sliver.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16118"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin, pi, user, node</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>slice_tag_id</I
></TT
>
: int, Slice tag identifier			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>value</I
></TT
>
: string or string			</P
><P
></P
><UL
><LI
><P
>&#13;string, Slice attribute value					</P
></LI
><LI
><P
>&#13;string, Initscript name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="UpdateTagType"
>UpdateTagType</A
></H2
><P
>Prototype:<A
NAME="AEN16147"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>UpdateTagType (auth, tag_type_id_or_name, tag_type_fields)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16150"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Updates the parameters of an existing tag type
with the values in tag_type_fields.</P
><P
>Returns 1 if successful, faults otherwise.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16154"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_id_or_name</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, Node tag type identifier					</P
></LI
><LI
><P
>&#13;string, Node tag type name					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>tag_type_fields</I
></TT
>
: struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>category</I
></TT
>
: string, Node tag category					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>description</I
></TT
>
: string, Node tag type description					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>tagname</I
></TT
>
: string, Node tag type name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if successful			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="VerifyPerson"
>VerifyPerson</A
></H2
><P
>Prototype:<A
NAME="AEN16193"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>VerifyPerson (auth, person_id_or_email, verification_key, verification_expires)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16196"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Verify a new (must be disabled) user's e-mail address and registration.</P
><P
>If verification_key is not specified, then a new verification_key
will be generated and stored with the user's account. The key will
be e-mailed to the user in the form of a link to a web page.</P
><P
>The web page should verify the key by calling this function again
and specifying verification_key. If the key matches what has been
stored in the user's account, then an e-mail will be sent to the
user's PI (and support if the user is requesting a PI role),
asking the PI (or support) to enable the account.</P
><P
>Returns 1 if the verification key if valid.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16202"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>admin</P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>auth</I
></TT
>
: struct, API authentication structure			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>AuthMethod</I
></TT
>
: string, Authentication method to use					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>person_id_or_email</I
></TT
>
: int or string			</P
><P
></P
><UL
><LI
><P
>&#13;int, User identifier					</P
></LI
><LI
><P
>&#13;string, Primary e-mail address					</P
></LI
></UL
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>verification_key</I
></TT
>
: string, Reset password key			</P
></LI
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>verification_expires</I
></TT
>
: int, Date and time when verification_key expires			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;int, 1 if verification_key is valid			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="system.listMethods"
>system.listMethods</A
></H2
><P
>Prototype:<A
NAME="AEN16234"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>system.listMethods ()</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16237"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>This method lists all the methods that the XML-RPC server knows
how to dispatch.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16240"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
></P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>None</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array, List of methods			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="system.methodHelp"
>system.methodHelp</A
></H2
><P
>Prototype:<A
NAME="AEN16253"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>system.methodHelp (method)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16256"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns help text if defined for the method passed, otherwise
returns an empty string.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16259"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
></P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Method name			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;string, Method help			</P
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="system.methodSignature"
>system.methodSignature</A
></H2
><P
>Prototype:<A
NAME="AEN16273"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>system.methodSignature (method)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16276"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Returns an array of known signatures (an array of arrays) for the
method name passed. If no signatures are known, returns a
none-array (test for type != array to detect missing signature).</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16279"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
></P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>method</I
></TT
>
: string, Method name			</P
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of array, Method signature			</P
><P
></P
><UL
><LI
><P
>&#13;string					</P
></LI
></UL
></LI
></UL
></DIV
><DIV
CLASS="section"
><HR><H2
CLASS="section"
><A
NAME="system.multicall"
>system.multicall</A
></H2
><P
>Prototype:<A
NAME="AEN16296"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>system.multicall (calls)</P
></BLOCKQUOTE
></P
><P
>Description:<A
NAME="AEN16299"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
>Process an array of calls, and return an array of results. Calls
should be structs of the form</P
><P
>{'methodName': string, 'params': array}</P
><P
>Each result will either be a single-item array containg the result
value, or a struct of the form</P
><P
>{'faultCode': int, 'faultString': string}</P
><P
>This is useful when you need to make lots of small calls without
lots of round trips.</P
></BLOCKQUOTE
></P
><P
>Allowed Roles:<A
NAME="AEN16306"
></A
><BLOCKQUOTE
CLASS="BLOCKQUOTE"
><P
></P
></BLOCKQUOTE
></P
><P
>Parameters:</P
><P
></P
><UL
><LI
><P
>&#13;				<TT
CLASS="parameter"
><I
>calls</I
></TT
>
: array of struct			</P
><P
></P
><UL
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>params</I
></TT
>
: array, Method arguments					</P
></LI
><LI
><P
>&#13;						<TT
CLASS="parameter"
><I
>methodName</I
></TT
>
: string, Method name					</P
></LI
></UL
></LI
></UL
><P
>Returns:</P
><P
></P
><UL
><LI
><P
>&#13;array of mixed or struct			</P
><P
></P
><UL
><LI
><P
>&#13;array of mixed					</P
></LI
><LI
><P
>&#13;struct					</P
><P
></P
><UL
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>faultCode</I
></TT
>
: int, XML-RPC fault code							</P
></LI
><LI
><P
>&#13;								<TT
CLASS="parameter"
><I
>faultString</I
></TT
>
: int, XML-RPC fault detail							</P
></LI
></UL
></LI
></UL
></LI
></UL
></DIV
></DIV
></DIV
>
