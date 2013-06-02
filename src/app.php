<?php
use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Vita\Provider\MongoServiceProvider;
use Vita\Provider\VimeoServiceProvider;
use Vita\Provider\UtilServiceProvider;

$app = new Application();
$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new TranslationServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new VimeoServiceProvider());
$app->register(new UtilServiceProvider());

// Twig
$app->register(new TwigServiceProvider(), array(
    'twig.path' => array(__DIR__.'/../templates'),
    'twig.options' => array('cache' => __DIR__.'/../cache/twig'),
));

// MongoDb
$app->register(new MongoServiceProvider());

// Flash message support
$app->before(function () use ($app) {
    $flash = $app['session']->get('flash');
    $app['session']->set('flash', null);

    if (!empty($flash)) {
        $app['twig']->addGlobal('flash', $flash);
    }
});

return $app;