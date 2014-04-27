<?php

namespace Model\Repository;

use Model\Entity\Album;
use Fredy\Model\Repository\Repository;
use Model\Factory\AlbumFactory;

class AlbumRepository extends Repository
{

    /**
     * @var string
     */
    protected $tableName = 'album';

    /**
     * @param $db \PDO
     */
    public function __construct($db)
    {
        $this->entity = new Album(null,null,null,null);
        $this->factory = new AlbumFactory();

        parent::__construct($db);
    }

}