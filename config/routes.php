<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Views\Twig;

return function (App $app) {
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        //Testing twig template
        $view = Twig::fromRequest($request);
        return $view->render($response, 'index.twig');
    });
};