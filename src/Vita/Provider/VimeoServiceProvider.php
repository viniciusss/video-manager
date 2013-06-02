<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 21:53
 */

namespace Vita\Provider;

use Silex\ServiceProviderInterface;
use Silex\Application;
use Vimeo\Vimeo;

class VimeoServiceProvider implements ServiceProviderInterface {

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        $app['vimeo'] = $app->share(function() use($app) {
            $app['vimeo.consumer_key'] = $app['vimeo.consumer_key'] ?: '';
            $app['vimeo.consumer_secret'] = $app['vimeo.consumer_secret'] ?: '';
            $app['vimeo.token'] = $app['vimeo.token'] ?: '';
            $app['vimeo.token_secret'] = $app['vimeo.token_secret'] ?: '';

            return new Vimeo(
                $app['vimeo.consumer_key'],
                $app['vimeo.consumer_secret'],
                $app['vimeo.token'],
                $app['vimeo.token_secret']
            );
        });
    }

    public function boot(Application $app)
    {

    }

}