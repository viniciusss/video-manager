<?php
/**
 * Package: videos-manager
 * User: viniciusdesa
 * Date: 27/05/13
 * Time: 04:30
 */

namespace Vita\VideoManager\Domain\Repository;


class VideoRepository extends AbstractRepository {

    public function findByUser($user)
    {
        self::toMongoId($user);
        return $this->collection->find(array('user' => $user));
    }

    public function save(array $data)
    {
        if( isset($data['user']))
            parent::toMongoId($data['user']);

        return parent::save($data);
    }
}