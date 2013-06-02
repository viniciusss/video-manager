<?php
$routes = array();

// Homepage
$routes['homepage'] = array(
    'method' => 'get',
    'pattern' => '/',
);

$routes['homepage']['to'] = function () use ($app) {
    return $app['twig']->render('home/index.twig');
};

// Videos
$routes['videos'] = array(
    'method' => 'get',
    'pattern' => '/videos',
);

$routes['videos']['to'] = function () use ($app) {

    $service = \Vita\VideoManager\Domain\Service\AbstractService::factory('video');
    return $app['twig']->render('videos/index.twig', array('videos' => $service->getAllVideos()));
};

$routes['videos-edit'] = array(
    'method' => 'get',
    'pattern' => '/videos/edit{id}',
);

$routes['videos-edit']['to'] = function ($id) use ($app) {
    return $app['twig']->render('videos/edit.twig');
};

$routes['videos-edit-save'] = array(
    'method' => 'post',
    'pattern' => '/videos/edit',
);

$routes['videos-edit-save']['to'] = function () use ($app) {
    /**
     * @var \Vita\VideoManager\Domain\Service\VideoService $service
     */
    $service = \Vita\VideoManager\Domain\Service\AbstractService::factory('video');


    addFlashMessage('Video Enviado Com Sucesso', 'novo video adicionado ao vimeo');
    return $app->redirect($app['url_generator']->generate('videos'));
};


$routes['videos-add'] = array(
    'method' => 'get',
    'pattern' => '/videos/add',
);

$routes['videos-add']['to'] = function () use ($app) {

    $form = $app['form.factory']->createBuilder('form', null)
        ->add('name')
        ->add('email')
        ->add('gender', 'choice', array(
            'choices' => array(1 => 'male', 2 => 'female'),
            'expanded' => true,
        ))
        ->getForm();

    return $app['twig']->render('videos/add.twig', array('form' => $form->createView()));
};

$routes['videos-add-save'] = array(
    'method' => 'post',
    'pattern' => '/videos/add',
);

$routes['videos-add-save']['to'] = function () use ($app) {
    /**
     * @var \Vita\VideoManager\Domain\Service\VideoService $service
     */
    $service = \Vita\VideoManager\Domain\Service\AbstractService::factory('video');


    addFlashMessage('Video Enviado Com Sucesso', 'novo video adicionado ao vimeo');
    return $app->redirect($app['url_generator']->generate('videos'));
};

// About
$routes['about'] = array(
    'method' => 'get',
    'pattern' => '/about',
);

$routes['about']['to'] = function () use ($app) {
    return $app['twig']->render('about/index.twig');
};

// Contact
$routes['contact'] = array(
    'method' => 'get',
    'pattern' => '/contact',
);

$routes['contact']['to'] = function () use ($app) {
    return $app['twig']->render('contact/index.twig');
};

$routes['contact-send'] = array(
    'method' => 'post',
    'pattern' => '/contact',
);

$routes['contact-send']['to'] = function () use ($app) {

    addFlashMessage('Teste',  'Mensagem de teste');

    //Redirect the user to another route
    return $app->redirect($app['url_generator']->generate('contact'));
};


return $routes;