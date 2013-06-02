<?php

// Homepage route
$app->get('/', function () use($app) {
    return $app['twig']->render('home/index.twig');
})->bind('homepage');

// Videos area
$videos = include __DIR__ . '/controllers/video.php';

// Campus area
$campus = include __DIR__ . '/controllers/campus.php';

// Load routes
$app->mount('/admin/videos', $videos);
$app->mount('/campus/', $campus);