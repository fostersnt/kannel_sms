<?php
require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

class CustomHelper
{
    public function getEnvData($variable_name) {
        try {
            return $_ENV[$variable_name] ?? 'N/A';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
