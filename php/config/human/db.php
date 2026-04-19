<?php
require_once dirname(__DIR__) . '/shared.php';

$config = nom035_get_config('human');
$db = $config['db'];

if (!defined('DB_SERVER')) {
   define('DB_SERVER', $db['server']);
}
if (!defined('DB_USERNAME')) {
   define('DB_USERNAME', $db['username']);
}
if (!defined('DB_PASSWORD')) {
   define('DB_PASSWORD', $db['password']);
}
if (!defined('DB_DATABASE')) {
   define('DB_DATABASE', $db['database']);
}

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$chatset_mysql = $config['charset'];

if ($conn) {
   mysqli_set_charset($conn, $chatset_mysql);
}

global $conn;
?>