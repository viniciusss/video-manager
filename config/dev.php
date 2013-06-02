<?php
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

// include the prod configuration
require __DIR__ . '/prod.php';

// enable the debug mode
$app['debug'] = true;

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/../logs/silex_dev.log',
));

$app->register($p = new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__ . '/../cache/profiler',
));

$app->mount('/_profiler', $p);

$app['mongodb.server'] = 'mongodb://localhost:27017';
$app['mongodb.dbname'] = 'videomanager';
$app['mongodb.options'] = array();

// Vimeo config
$app['vimeo.consumer_key'] = '72ba43835dcb0c9c5fcb5b22aab036bae14bfc6c';
$app['vimeo.consumer_secret'] = '79068f4b5acea73865636813ef5f6664c704448f';
$app['vimeo.token'] = '4c9d3c6e0f93e28ffeb872b5f8b8b1c1';
$app['vimeo.token_secret'] = '3caa25d139ace65f9fb807e866cd262e5aa8a223';