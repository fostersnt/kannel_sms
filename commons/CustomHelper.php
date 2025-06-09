<?php

use Psr\Log\LogLevel;

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

class CustomHelper
{
    public function getEnvData($variable_name)
    {
        try {
            return $_ENV[$variable_name] ?? 'N/A';
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function logMessage($message)
    {
        $logger = new Katzgrau\KLogger\Logger(__DIR__ . '/../logs', LogLevel::INFO, array(
            'extension' => 'txt',
        ));
        $logger->info($message);
    }
}
