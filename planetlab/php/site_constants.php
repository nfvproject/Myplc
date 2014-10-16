<?php
include('plc_config.php');

define('PL_API_SERVER', PLC_API_HOST);
define('PL_API_PATH', PLC_API_PATH);
define('PL_API_PORT', PLC_API_PORT);
define('PL_API_CAPABILITY_AUTH_METHOD', 'capability');
define('PL_API_CAPABILITY_PASS', PLC_API_MAINTENANCE_PASSWORD);
define('PL_API_CAPABILITY_USERNAME', PLC_API_MAINTENANCE_USER);
define('WWW_BASE', PLC_WWW_HOST);
define('BOOT_BASE', PLC_BOOT_HOST);
define('DEBUG', PLC_WWW_DEBUG);
define('API_CALL_DEBUG', PLC_API_DEBUG);
define('SENDMAIL', PLC_MAIL_ENABLED);
define('PLANETLAB_SUPPORT_EMAIL', PLC_NAME . ' Support <' . PLC_MAIL_SUPPORT_ADDRESS . '>');
define('PLANETLAB_SUPPORT_EMAIL_ONLY', PLC_MAIL_SUPPORT_ADDRESS);
?>
