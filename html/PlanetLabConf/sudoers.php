<?php
// Get admin API handle
require_once 'plc_config.php';

$user = PLC_SLICE_PREFIX . '_monitor';

echo "# -----------------------------------------------------------------
# We're assuming that ssh authentication has already been used, this
# is more risky than I'm comfortable with, but it saves the problem 
# of managing a separate password file.
# -----------------------------------------------------------------
Defaults	!authenticate

# -----------------------------------------------------------------
# No surpise... root has universal access
# -----------------------------------------------------------------
root		ALL = (ALL) ALL

# -----------------------------------------------------------------
# SITE_CMDS are those available to local site administrators
# -----------------------------------------------------------------
Cmnd_Alias	SITE_CMDS =	/usr/sbin/vps, \
				/usr/sbin/vpstree, \
				/usr/sbin/vtop, \
				/bin/ps, \
				/usr/bin/pstree, \
				/usr/bin/top, \
				/usr/sbin/tcpdump, \
				/usr/bin/pfgrep, \
				/usr/local/planetlab/bin/pl-catlogs, \
				/sbin/halt, \
				/sbin/reboot, \
				/sbin/shutdown, \
				/usr/bin/passwd -d site_admin, \
				/usr/bin/passwd site_admin, \
				/bin/more /var/log/messages, \
				/bin/more /var/log/nm

# -----------------------------------------------------------------
# Site Admins -- accounts with admin privileges on the local nodes
# -----------------------------------------------------------------
site_admin	ALL = SITE_CMDS
$user       ALL = SITE_CMDS
";
?>
