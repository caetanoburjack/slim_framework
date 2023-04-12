<?php


// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Settings
$settings = [
    'displayErrorDetails' => true,
    'determineRouteBeforeAppMiddleware' => false,
    'twig_views' => __DIR__ . '/../src/Views',
    'connection' => [
        'host' => 'localhost',
        'dbname' => 'slim',
        'dbuser' => 'root',
        'dbpass' => '98919003',
    ],
];

// ...

return $settings;