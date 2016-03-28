<?php
ini_set('display_errors', 1);
error_reporting(E_NOTICE | E_ALL);

require_once '../vendor/autoload.php';

$app = new Danielozano\Framework\Core\App();

$app->run();