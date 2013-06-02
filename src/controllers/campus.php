<?php

$campusController = $app['controllers_factory'];

$campusController->get('/', function () use($app) {
    return $app['twig']->render('campus/dashboard.twig');
})->bind('campus-dashboard');

return $campusController;