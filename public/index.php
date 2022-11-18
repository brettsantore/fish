<?php

declare(strict_types = 1);

include_once '../vendor/autoload.php';

use Santore\Fish\Container;
use Santore\Fish\Controller\IndexController;

$router = new League\Route\Router();

$container = new Container(include_once '../config/container.php');

$strategy = new League\Route\Strategy\ApplicationStrategy();
$strategy->setContainer($container);
$router = $router->setStrategy($strategy);

$router->get('/', IndexController::class);

$response = $router->dispatch(Laminas\Diactoros\ServerRequestFactory::fromGlobals());

$sapiEmitter = new Laminas\HttpHandlerRunner\Emitter\SapiEmitter();
$sapiEmitter->emit($response);
