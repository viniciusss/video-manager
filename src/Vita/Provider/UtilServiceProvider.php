<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 22:37
 */

namespace Vita\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Vita\Util;

class UtilServiceProvider implements ServiceProviderInterface {

    public function register(Application $app)
    {
        $app['vita.util'] = $app->share(function($app){
            return new Util($app);
        });
    }

    public function boot(Application $app)
    {
    }

}