<?php

use \Vita\VideoManager\Domain\Service\AbstractService;
use Vita\VideoManager\Domain\Service\VideoService;

/**
 * @return VideoService
 */
$app['service.video'] = $app->share(function($app) {
  return AbstractService::factory('video', $app);
});