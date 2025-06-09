<?php
require_once __DIR__ . "/../commons/CustomHelper.php";

$helper = new CustomHelper();

echo $helper->getEnvData('DB') . "\n";