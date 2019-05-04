<?php
use \Psr\Container\ContainerInterface;

/** @var ContainerInterface */
$container = $app->getContainer();

// Custom Error Handler
$container['errorHandler'] = function (ContainerInterface $c) {
    return new App\Exceptions\ErrorHandler($c->get('settings')['displayErrorDetails']);
};

// App Service Providers
$container->register(new App\Services\Sample\HelloServiceProvider());

// View Renderer
$container['view'] = function (ContainerInterface $c) {
    /** @var array */
    $config = $c->get('settings')['view'];

    $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
    return $view;
};

// Logger
$container['logger'] = function (ContainerInterface $c) {
    $setting = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($setting['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($setting['path'], $setting['level']));
    return $logger;
};
