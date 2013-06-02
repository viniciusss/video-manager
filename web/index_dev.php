<?php
use Symfony\Component\ClassLoader\DebugClassLoader;
use Symfony\Component\Debug\Debug;

require_once __DIR__.'/../vendor/autoload.php';

error_reporting(-1);
DebugClassLoader::enable();
Debug::enable();

$app = require __DIR__.'/../src/app.php';
require __DIR__.'/../config/dev.php';
require __DIR__.'/../src/services.php';
require __DIR__.'/../src/controllers.php';
$app->run();