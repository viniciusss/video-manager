<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 18:40
 */

namespace Vita\VideoManager\Domain\Service;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Vita\VideoManager\Domain\Repository\AbstractRepository;
use Silex\Application;

abstract class AbstractService {
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var AbstractRepository
     */
    protected $repository;

    public function __construct(Application $app, AbstractRepository $repository)
    {
        $this->app = $app;
        $this->repository = $repository;
    }

    /**
     * @return AbstractRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param string $name
     * @return AbstractService
     */
    public static function factory($name, $app, $conn = 'default')
    {
        $connection = $app['mongodb.connection'];

        $db = $connection->selectDB($app['mongodb.dbname']);

        $repository = AbstractRepository::factory($name, $db);

        $name = ucfirst($name);

        $className = 'Vita\\VideoManager\\Domain\\Service\\' . $name . 'Service';

        return new $className($app, $repository);
    }
}