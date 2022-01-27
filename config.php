<?php
define('HOST','127.0.0.1');
define('DB_NAME', 'share_board');
define('USER_NAME', 'root');
define('PASS',NULL);
define('CHARSET','utf8mb4');

if(!defined("ROOT_PATH")) define("ROOT_PATH", '/');
if(!defined("SITE_URL")){
    $root = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $root = str_replace("index.php", "",$root);
    define('ROOT_URL',$root);
}
