<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Add DI container definitions
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Create DI container instance
$container = $containerBuilder->build();

(require __DIR__ . '/connection.php')($container);

$table = "slim.users";
$columns = "Id INTEGER (11) NOT NULL AUTO_INCREMENT PRIMARY KEY, Name VARCHAR(48) NOT NULL, Email VARCHAR(48) NOT NULL";
$container->get('connection')->exec("CREATE TABLE IF NOT EXISTS {$table} ({$columns})");

$sql = "INSERT INTO " . $table . " (Name, Email) VALUES ('Caetano Burjack', 'caetanoburjack@gmail.com')";
print_r($sql);
if ($container->get('connection')->exec($sql) === true) {
    echo "That is right!";
} else {
    echo "ERROR: {$sql} - {$container->get('connection')->error}";
}

// Create Slim App instance
$app = $container->get(App::class);

// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);

return $app;