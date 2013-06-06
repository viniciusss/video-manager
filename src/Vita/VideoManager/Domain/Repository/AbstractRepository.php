<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 28/05/13
 * Time: 18:37
 */

namespace Vita\VideoManager\Domain\Repository;


abstract class AbstractRepository {
    /**
     * @var \MongoCollection
     */
    protected $collection;

    public function __construct(\MongoCollection $collection)
    {
        $this->collection = $collection;
    }

    public function findAll()
    {
        return $this->collection->find();
    }

    public function findOne($id)
    {
        self::toMongoId($id);
        $data = $this->collection->findOne(array('_id' => $id));

        if ( empty($data) )
            throw new \Exception('Registro pro id '.$id.' nao encontrado.');

        return $data;
    }

    public function save(array $data)
    {
        if( isset($data['_id']) )
            self::toMongoId($data['_id']);

        $this->collection->save($data);
    }

    public static function toMongoId(&$id) {
        if( !$id instanceof \MongoId )
            $id = new \MongoId($id);
    }

    /**
     * @param string $name
     * @return AbstractRepository
     */
    public static function factory($name, \MongoDB $db, $collectionName = null) {

        if( !isset($collectionName) )
            $collectionName = $name;

        $name = ucfirst($name).'Repository';

        $className = 'Vita\\VideoManager\\Domain\\Repository\\' . $name;

        $collection = $db->{$collectionName};

        return new $className($collection);
    }
}