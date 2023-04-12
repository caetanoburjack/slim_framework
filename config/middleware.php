<?php

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app) {
    // Parse json, form data and xml
    $app->addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware
    $app->addRoutingMiddleware();


    // Create Twig
    $twig = Twig::create($app->getContainer()->get('settings')['twig_views'], ['cache' => false]);

    // Add Twig-View Middleware
    $app->add(TwigMiddleware::create($app, $twig));

    // Handle exceptions
    $app->addErrorMiddleware(true, true, true);
};