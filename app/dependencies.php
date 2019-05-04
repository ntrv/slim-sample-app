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

$container[App\Controller\HelloController::class] = function (ContainerInterface $c) {
    $view = $c->get('view');
    return new \App\Controller\HelloController($view);
};
