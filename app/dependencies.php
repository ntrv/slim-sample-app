<?php
use \Psr\Container\ContainerInterface;

/** @var ContainerInterface */
$container = $app->getContainer();

$container['view'] = function (ContainerInterface $container) use ($configs) {
    /** @var array */
    $config = $configs['settings']['view'];

    $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
    return $view;
};

$container['logger'] = function (ContainerInterface $c) use ($configs) {
    $setting = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($setting['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($setting['path'], $setting['level']));
    return $logger;
};
