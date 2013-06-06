<?php

// Videos area
$videos = include __DIR__ . '/controllers/video.php';

// Campus area
$campus = include __DIR__ . '/controllers/campus.php';

// Load routes
$app->mount('/admin/videos', $videos);
$app->mount('/', $campus);