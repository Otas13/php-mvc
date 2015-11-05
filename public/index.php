<?php
ob_start();

use core\libs\App;
use core\helpers\SessionManager;

require_once '../app/init.php';

SessionManager::sessionStart('test');

$app = new App;

ob_flush();
