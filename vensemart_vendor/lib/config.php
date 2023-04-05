<?php
session_start();
ini_set('max_execution_time', 0);
ini_set('memory_limit', '2048M');
error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors', 'on');
@ini_set('error_reporting', 1);
define('HOSTNAME', 'localhost');

define('DB_USERNAME', 'forge');
define('DB_PASSWORD', 'LhHXCXjEssshPUO7wKph');
define('DB_DATABASE', 'vensemarts_apps');

define('SITE_URL', 'https://vensemart.com/vensemart_vendor/');
define('PROJECT_NAME', 'Vensemart');

define('TABLE_PREFIX', '');
define('FRONTEND_PATH', 'admin/action_control/');
define('ADMIN_PATH', 'action_control/');
define('CURRENCY', 'NGN ');
define('PER_PAGE_ADMIN', '100');
include('autoload.inc.php');
date_default_timezone_set("Africa/Lagos");
