<?php
use \Psr\Container\ContainerInterface;

/** @var ContainerInterface */
$container = $app->getContainer();

// App Service Providers
$container->register(new App\Services\Sample\HelloServiceProvider());

// View Renderer
$container['view'] = function (ContainerInterface $container) use ($configs) {
    /** @var array */
    $config = $configs['settings']['view'];

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
