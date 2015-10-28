<?php
ob_start();

require_once '../app/init.php';
SessionManager::sessionStart('test');

#session_start();
$sessions = session_get_cookie_params();

$app = new App;

ob_flush();
