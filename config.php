<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER', 'root');
define('DB_PASS', 'root');



if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] = 'on'){
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');

define('ROOT', dirname( __FILE__). '/');

define('SITE_EMAIL', 'info@project.com');
define('SITE_NAME', 'Сайт Digital Nomad');








?>