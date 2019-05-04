<?php
use \Psr\Container\ContainerInterface;

/** @var ContainerInterface */
$container = $app->getContainer();

$container['view'] = function (ContainerInterface $container) use ($configs) {
    /** @var array */
    $config = $configs['view'];

    $view = new \Slim\Views\Twig($config['template_path'], $config['twig']);
    return $view;
};
