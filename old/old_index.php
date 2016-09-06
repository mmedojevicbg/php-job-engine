<?php
require 'vendor/autoload.php';
require 'config.php';
use mmedojevicbg\pje\ExecuteJob;
$app = new Slim\App();

// --- twig inicialization ---
$container = $app->getContainer();
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ . DIRECTORY_SEPARATOR . 'template', [
        __DIR__ . DIRECTORY_SEPARATOR . 'cache' => 'cache'
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
    return $view;
};
// ---------------------------

// --- routing ---
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'dashboard.html', [
    ]);
});
$app->get('/jobs', function ($request, $response, $args) {
    return $this->view->render($response, 'jobs.html', [
    ]);
});
$app->get('/stats', function ($request, $response, $args) {
    return $this->view->render($response, 'stats.html', [
    ]);
});
// ---------------------------

$app->run();