<?php

use \Vita\VideoManager\Domain\Service\AbstractService;
use Vita\VideoManager\Domain\Service\VideoService;

/**
 * @return VideoService
 */
$app['service.video'] = $app->share(function($app) {
  return AbstractService::factory('video', $app);
});

$app['vimeo'] = $app->share(function($app){
   return new Vimeo\Vimeo($app['vimeo.consumer_key'], $app['vimeo.consumer_key'], $app['vimeo.token'], $app['vimeo.token_secret']);
});