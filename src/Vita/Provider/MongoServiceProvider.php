<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 19:13
 */

namespace Vita\Provider;

use Silex\ServiceProviderInterface;
use Silex\Application;

class MongoServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mongodb.connection'] = $app->share(function ($app) {

            if( empty($app['mongodb.options']) )
                $app['mongodb.options'] = array("connect" => TRUE);

            return new \MongoClient($app['mongodb.server'], $app['mongodb.options']);
        });
    }

    public function boot(Application $app)
    {

    }
}