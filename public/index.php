<?php
ob_start();

require_once '../app/init.php';
SessionManager::sessionStart('test');

$app = new App;

ob_flush();
