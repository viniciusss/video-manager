<?php

use \Vita\VideoManager\Domain\Service\AbstractService;
use Vita\VideoManager\Domain\Service\VideoService;

/**
 * @return VideoService
 */
$app['service.video'] = $app->share(function ($app) {
    return AbstractService::factory('video', $app);
});

$app['auth.user'] = $app->share(function ($app) {
    return 123;
});

$app['vimeo'] = $app->share(function ($app) {
    $vimeo = new Vimeo\Vimeo($app['vimeo.consumer_key'], $app['vimeo.consumer_secret']);
    $vimeo->setToken($app['vimeo.token'], $app['vimeo.token_secret']);

    return $vimeo;
});