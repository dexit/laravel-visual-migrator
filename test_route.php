<?php
require __DIR__.'/vendor/autoload.php';

use Orchestra\Testbench\Facade;
use Illuminate\Support\Facades\Route;

$app = Orchestra\Testbench\Container::getInstance();

// Mock some migrations
if (!file_exists(database_path('migrations'))) {
    mkdir(database_path('migrations'), 0777, true);
}

$response = Facade::get('visual-migrator/api/schema');
echo "Status: " . $response->getStatusCode() . "\n";
echo "Content: " . substr($response->getContent(), 0, 100) . "...\n";
