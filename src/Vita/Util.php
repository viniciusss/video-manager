<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 22:34
 */

namespace Vita;

use Silex\Application;
use Symfony\Component\Form\AbstractType;

class Util {

    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    function addFlashMessage($short, $ext, $type = 'success'){
        $this->app['session']->set('flash', array(
            'type' => $type, //other possible values include 'warning', 'info',
            //'success' - it's part of Twitter Bootstrap
            'short' => $short,
            'ext' => $ext,
        ));
    }

    public function getForm($name)
    {
        $name = ucfirst($name);
        $className = 'Vita\\VideoManager\\Domain\\Form\\' . $name . 'Type';

        /**
         * @var AbstractType $formType
         */
        $formType = new $className;

        return $this->app['form.factory']->create($formType);
    }
}