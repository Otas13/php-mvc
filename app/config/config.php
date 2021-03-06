<?php

/*
                                                            CONFIG FILE

     development/environment mode
     development mode -> budou zobrazovany vsechny errory vcetne varovani
     environment mode -> budou zobrazeny pouze tvrde errory
*/
define('ENVIRONMENT', 'development');

/*
     URL adresa slozky public
     localhost/mvc/public/
*/
define('ROOT', str_replace('index.php',"",'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

/*
    uplny ROOT webu
    localhost/mvc/
*/
define('SUPER_ROOT', str_replace('public/index.php',"",'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

/*
    database constants
*/
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'php');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');


if (ENVIRONMENT == 'development') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

