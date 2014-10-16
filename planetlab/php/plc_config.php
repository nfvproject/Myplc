<?php
// DO NOT EDIT. This file was automatically generated at
// Thu Oct 16 16:43:24 2014 from:
// 
// /etc/planetlab/plc_config.xml

// comon
// The address of the CoMon url that provides information for this PLC's
// nodes (if not the default http://comon.cs.princeton.edu/)
define('MYSLICE_COMON_URL', NULL);

// tophat
// True, if tophat data are available for this PLC's nodes
define('MYSLICE_TOPHAT_AVAILABLE', 0);

// comon
// True, if comon data are available for this PLC's nodes
define('MYSLICE_COMON_AVAILABLE', 0);

// SSL Private Key
// The SSL private key to use for encrypting HTTPS traffic.
define('PLC_MONITOR_SSL_KEY', '/etc/planetlab/monitor_ssl.key');

// SSL Public Certificate
// The corresponding SSL public certificate for the HTTP server. By
// default, this certificate is self-signed. You may replace the
// certificate later with one signed by a root CA.
define('PLC_MONITOR_SSL_CRT', '/etc/planetlab/monitor_ssl.crt');

// IP Address
// The IP address of the monitor server.
define('PLC_MONITOR_IP', NULL);

// Database Hostname
// The hostname for the monitor database.
define('PLC_MONITOR_DBHOST', 'localhost');

// Enabled
// Enable on this machine.
define('PLC_MONITOR_ENABLED', 0);

// Monitor Email Address
// All messages from Monitor will appear to come from this address.
define('PLC_MONITOR_FROM_EMAIL', 'root+monitor@localhost.localdomain');

// Hostname
// The fully qualified hostname.
define('PLC_MONITOR_HOST', 'localhost.localdomain');

// CC Email Address
// All messages from Monitor will be copied to this address.
define('PLC_MONITOR_CC_EMAIL', 'root+monitor@localhost.localdomain');

// Queue Name in RT for new messages
// All messages from Monitor will be copied to this address.
define('PLC_MONITOR_RT_QUEUE', 'support');

// Database Password
// The password to use when accessing the database, Monitor user account
// in the local PLC.
define('PLC_MONITOR_DBPASSWORD', NULL);

// Database User
// The username for connecting to the monitor database.
define('PLC_MONITOR_DBUSER', 'monitoruser');

// Root CA SSL Public Certificate
// The certificate of the root CA, if any, that signed your server
// certificate. If your server certificate is self-signed, then this file
// is the same as your server certificate.
define('PLC_MONITOR_CA_SSL_CRT', '/etc/planetlab/monitor_ca_ssl.crt');

// Database Name
// Name of monitor database.
define('PLC_MONITOR_DBNAME', 'monitor');

// Enable DNS
// Enable the internal DNS server. The server does not provide reverse
// resolution and is not a production quality or scalable DNS solution.
// Use the internal DNS server only for small deployments or for testing.
define('PLC_DNS_ENABLED', 1);

// root
// Username of a privileged user in RT who can create tickets for any RT
// Queue.
define('PLC_RT_WEB_USER', 'root');

// IP Address
// The IP address of the RT server.
define('PLC_RT_IP', NULL);

// Enabled
// Enable on this machine.
define('PLC_RT_ENABLED', 0);

// password
// Password for RT web user.
define('PLC_RT_WEB_PASSWORD', 'password');

// CC Email Address
// All messages to and from PLCRT will be copied to this address.
define('PLC_RT_CC_ADDRESS', 'root+cclist@localhost.localdomain');

// Hostname
// The fully qualified hostname.
define('PLC_RT_HOST', 'localhost.localdomain');

// Database Password
// Password to use when accessing the RT database.
define('PLC_RT_DBPASSWORD', NULL);

// pldistro for nodes
// The default 'pldistro' to use when installing nodes. You need to have
// the corresponding bootstrapfs images available for nodes.
define('PLC_FLAVOUR_NODE_PLDISTRO', 'lxc');

// arch for nodes
// The default 'arch' to use when installing nodes. This is offered
// mostly for consistency with the rest of the PLC_FLAVOUR category, but
// does not have much of a practical interest. In any case, you need to
// have the corresponding bootstrapfs images available for nodes.
define('PLC_FLAVOUR_NODE_ARCH', 'x86_64');

// fcdistro for nodes
// THIS CURRENTLY HAS NO EFFECT. The default 'fcdistro' to use when
// installing nodes.You need to have the corresponding bootstrapfs images
// available for nodes. THIS CURRENTLY HAS NO EFFECT.
define('PLC_FLAVOUR_NODE_FCDISTRO', 'f18');

// pldistro for slivers
// The default 'pldistro' to use for creating slivers. You need to have
// the corresponding vserver variant rpm available for nodes.
define('PLC_FLAVOUR_SLICE_PLDISTRO', 'lxc');

// arch for slivers
// The default 'arch' to use for slivers. This is useful if you have
// heterogeneous nodes (i686 and x86_64), but want slivers to be
// homogeneous. You need to have the corresponding vserver variant rpm
// available for nodes.
define('PLC_FLAVOUR_SLICE_ARCH', 'x86_64');

// Allows to compute a virtualization mechanism from an fcdistro.
// Starting with 5.2 MyPLC has support for either 'vs' or 'lxc', and this
// gives a correspondance from the node's fcdistro to the right
// virtualization mechanism. This information is essentially used by the
// BootManager for getting the installation phase right like e.g. when
// partitioning disks, and not to figure the contents of the nodeimage
// that depend only on fcdistro, pldistro and of course arch. This can be
// overridden by setting the vrt tag on that particular node.
define('PLC_FLAVOUR_VIRT_MAP', ' f8,f12,f14,centos5,centos6:vs; default:lxc ');

// fcdistro for slivers
// The default 'fcdistro' to use for creating slivers. You need to have
// the corresponding vserver variant rpm available for nodes.
define('PLC_FLAVOUR_SLICE_FCDISTRO', 'f18');

// XMPP server
// The fully qualified hostname of the XMPP server.
define('PLC_OMF_XMPP_SERVER', '10.21.2.179');

// OMF integration
// Enable OMF integration.
define('PLC_OMF_ENABLED', 1);

// Hostname
// The fully qualified hostname.
define('PLC_PLANETFLOW_HOST', 'localhost.localdomain');

// SSL Private Key
// The SSL private key to use for encrypting HTTPS traffic. If non-
// existent, one will be generated.
define('PLC_WWW_SSL_KEY', '/etc/planetlab/www_ssl.key');

// IP Address
// The IP address of the web server, if not resolvable.
define('PLC_WWW_IP', NULL);

// Enabled
// Enable the web server on this machine.
define('PLC_WWW_ENABLED', 1);

// SSL Public Certificate
// The corresponding SSL public certificate for the HTTP server. By
// default, this certificate is self-signed. You may replace the
// certificate later with one signed by a root CA.
define('PLC_WWW_SSL_CRT', '/etc/planetlab/www_ssl.crt');

// Hostname
// The fully qualified hostname of the web server.
define('PLC_WWW_HOST', 'myplc.ict.ac.cn');

// SSL Port
// The TCP port number through which the protected portions of the web
// site should be accessed.
define('PLC_WWW_SSL_PORT', 443);

// Debug
// Enable debugging output on web pages. Do not enable on a production
// system!
define('PLC_WWW_DEBUG', 0);

// Root CA SSL Public Certificate
// The certificate of the root CA, if any, that signed your server
// certificate. If your server certificate is self-signed, then this file
// is the same as your server certificate.
define('PLC_WWW_CA_SSL_CRT', '/etc/planetlab/www_ca_ssl.crt');

// Port
// The TCP port number through which the unprotected portions of the web
// site should be accessed.
define('PLC_WWW_PORT', 80);

// Enable /etc/hosts configuration
// Let PLC manage /etc/hosts
define('PLC_HOSTS_ENABLED', 1);

// vsys tags set by default
// Comma-separated list of vsys script names that all newly created
// slices will have as their vsys tags. For older slices, see the check-
// vsys-defaults.py script as part of the myplc package
define('PLC_VSYS_DEFAULTS', ' ');

// Slice Prefix
// The abbreviated name of this PLC installation. It is used as the
// prefix for system slices (e.g., pl_conf). Warning: Currently, this
// variable should not be changed.
define('PLC_SLICE_PREFIX', 'CENI');

// Root SSH Private Key
// The SSH private key used to access the root account on your nodes.
define('PLC_ROOT_SSH_KEY', '/etc/planetlab/root_ssh_key.rsa');

// Root GPG Private Keyring
// The SSH private key used to access the root account on your nodes.
define('PLC_ROOT_GPG_KEY', '/etc/planetlab/secring.gpg');

// Root GPG Public Keyring
// The GPG public keyring used to sign the Boot Manager and all node
// packages.
define('PLC_ROOT_GPG_KEY_PUB', '/etc/planetlab/pubring.gpg');

// Name
// The name of this PLC installation. It is used in the name of the
// default system site (e.g., PlanetLab Central) and in the names of
// various administrative entities (e.g., PlanetLab Support).
define('PLC_NAME', 'CENI');

// Root SSH Public Key
// The SSH public key used to access the root account on your nodes.
define('PLC_ROOT_SSH_KEY_PUB', '/etc/planetlab/root_ssh_key.pub');

// Root Password
// The password of the initial administrative account. Also the password
// of the root account on the Boot CD.
define('PLC_ROOT_PASSWORD', '060427');

// Root in Hierarchical Naming Space 
//  The root of this peer in the hierarchical federation naming space.
define('PLC_HRN_ROOT', 'ceni');

// Shortame
// The short name of this PLC installation. It is mostly used in the web
// interface when displaying local objects.
define('PLC_SHORTNAME', 'CENI');

// Debug SSH Public Key
// The SSH public key used to access the root account on your nodes when
// they are in Debug mode.
define('PLC_DEBUG_SSH_KEY_PUB', '/etc/planetlab/debug_ssh_key.pub');

// Debug SSH Private Key
// The SSH private key used to access the root account on your nodes when
// they are in Debug mode.
define('PLC_DEBUG_SSH_KEY', '/etc/planetlab/debug_ssh_key.rsa');

// Root Account
// The name of the initial administrative account. We recommend that this
// account be used only to create additional accounts associated with
// real administrators, then disabled.
define('PLC_ROOT_USER', 'root@sfa.ict.ac.cn');

// SSL Private Key
// The SSL private key to use for encrypting HTTPS traffic.
define('PLC_BOOT_SSL_KEY', '/etc/planetlab/boot_ssl.key');

// IP Address
// The IP address of the boot server, if not resolvable.
define('PLC_BOOT_IP', NULL);

// Enabled
// Enable the boot server on this machine.
define('PLC_BOOT_ENABLED', 1);

// SSL Public Certificate
// The corresponding SSL public certificate for the HTTP server. By
// default, this certificate is self-signed. You may replace the
// certificate later with one signed by a root CA.
define('PLC_BOOT_SSL_CRT', '/etc/planetlab/boot_ssl.crt');

// Hostname
// The fully qualified hostname of the boot server.
define('PLC_BOOT_HOST', 'myplc.ict.ac.cn');

// SSL Port
// The TCP port number through which the protected portions of the boot
// server should be accessed.
define('PLC_BOOT_SSL_PORT', 443);

// Root CA SSL Public Certificate
// The certificate of the root CA, if any, that signed your server
// certificate. If your server certificate is self-signed, then this file
// is the same as your server certificate.
define('PLC_BOOT_CA_SSL_CRT', '/etc/planetlab/boot_ca_ssl.crt');

// Port
// The TCP port number through which the unprotected portions of the boot
// server should be accessed.
define('PLC_BOOT_PORT', 80);

// Mom List Address
// This address is used by operations staff to monitor Mom (formerly
// pl_mom) messages indicating excessive BW or memory usage by a slice.
// Mom messages sent to slices will be cc'ed to this list so as not to
// clog the Support Address list.
define('PLC_MAIL_MOM_LIST_ADDRESS', 'root+mom@localhost.localdomain');

// Slice Address
// This address template is used for sending e-mail notifications to
// slices. SLICE will be replaced with the name of the slice.
define('PLC_MAIL_SLICE_ADDRESS', 'root+SLICE@localhost.localdomain');

// Enable Mail
// Set to false to suppress all e-mail notifications and warnings.
define('PLC_MAIL_ENABLED', 1);

// Boot Messages Address
// The API will notify this address when a problem occurs during node
// installation or boot.
define('PLC_MAIL_BOOT_ADDRESS', 'root+install-msgs@localhost.localdomain');

// Support Address
// This address is used for support requests. Support requests may
// include traffic complaints, security incident reporting, web site
// malfunctions, and general requests for information. We recommend that
// the address be aliased to a ticketing system such as Request Tracker.
define('PLC_MAIL_SUPPORT_ADDRESS', 'wangyang2013@ict.ac.cn');

// Enable Ratelimit
// Enable Ratelimit for sites
define('PLC_RATELIMIT_ENABLED', 'false');

// IP Mask
// The IP Mask that should be applied to incoming packets to match the IP
// Subnet for IPoD packets.
define('PLC_API_IPOD_MASK', '255.255.255.255');

// SSL Private Key
// The SSL private key to use for encrypting HTTPS traffic. If non-
// existent, one will be generated.
define('PLC_API_SSL_KEY', '/etc/planetlab/api_ssl.key');

// Root CA SSL Public Certificate
// The certificate of the root CA, if any, that signed your server
// certificate. If your server certificate is self-signed, then this file
// is the same as your server certificate.
define('PLC_API_CA_SSL_CRT', '/etc/planetlab/api_ca_ssl.crt');

// IP Address
// The IP address of the API server, if not resolvable.
define('PLC_API_IP', NULL);

// Enabled
// Enable the API server on this machine.
define('PLC_API_ENABLED', 1);

// Authorized Hosts
// A space-separated list of IP addresses allowed to access the API
// through the maintenance account. The value of this variable is set
// automatically to allow only the API, web, and boot servers, and should
// not be changed.
define('PLC_API_MAINTENANCE_SOURCES', '10.24.0.70 127.0.0.1');

// SSL Public Certificate
// The corresponding SSL public certificate. By default, this certificate
// is self-signed. You may replace the certificate later with one signed
// by a root CA.
define('PLC_API_SSL_CRT', '/etc/planetlab/api_ssl.crt');

// Maintenance User
// The username of the maintenance account. This account is used by local
// scripts that perform automated tasks, and cannot be used for normal
// logins.
define('PLC_API_MAINTENANCE_USER', 'maint@localhost.localdomain');

// Hostname
// The fully qualified hostname of the API server.
define('PLC_API_HOST', 'myplc.ict.ac.cn');

// IP Subnet
// The IP Subnet for all API servers. Used to identify IPoD packet
// senders.
define('PLC_API_IPOD_SUBNET', '127.0.0.1');

// Debug
// Enable verbose API debugging. Do not enable on a production system!
define('PLC_API_DEBUG', 0);

// Path
// The base path of the API URL.
define('PLC_API_PATH', '/PLCAPI/');

// Port
// The TCP port number through which the API should be accessed.
define('PLC_API_PORT', 443);

// Maintenance Password
// The password of the maintenance account. If left blank, one will be
// generated. We recommend that the password be changed periodically.
define('PLC_API_MAINTENANCE_PASSWORD', '5852c125-0a30-4913-803a-667452ccd239');

// Database Name
// The name of the database to access.
define('PLC_DB_NAME', 'planetlab5');

// IP Address
// The IP address of the database server, if not resolvable.
define('PLC_DB_IP', NULL);

// Enabled
// Enable the database server on this machine.
define('PLC_DB_ENABLED', 1);

// Hostname
// The fully qualified hostname of the database server.
define('PLC_DB_HOST', 'myplc.ict.ac.cn');

// Database Username
// The username to use when accessing the database.
define('PLC_DB_USER', 'pgsqluser');

// Database Password
// The password to use when accessing the database. If left blank, one
// will be generated.
define('PLC_DB_PASSWORD', '3dd0996b-ade5-4e4e-90a9-4b973f2dab55');

// Type
// The type of database server. Currently, only postgresql is supported.
define('PLC_DB_TYPE', 'postgresql');

// Port
// The TCP port number through which the database server should be
// accessed.
define('PLC_DB_PORT', 5432);

// Secondary DNS Server
// Secondary DNS server address.
define('PLC_NET_DNS2', '10.21.2.180');

// Primary DNS Server
// Primary DNS server address.
define('PLC_NET_DNS1', '10.21.2.180');

// Lease granularity
// The smallest timeslot that can be allocated to a node. All leases will
// be rounded to this granularity, so e.g. if you set 3600 all leases
// will start and stop at round hours.
define('PLC_RESERVATION_GRANULARITY', 3600);
?>
