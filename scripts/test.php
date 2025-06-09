<?php
require_once __DIR__ . "/../commons/CustomHelper.php";

$helper = new CustomHelper();

$helper->logMessage("Hello world");

echo __DIR__ . "\n";
// echo $helper->getEnvData('DB') . "\n";