<?php

namespace Model\Repository;

use Model\Entity\Song;
use Fredy\Model\Repository\Repository;
use Model\Factory\SongFactory;

class SongRepository extends Repository
{

    /**
     * @var string
     */
    protected $tableName = 'song';

    /**
     * @param $db \PDO
     */
    public function __construct($db)
    {
        $this->entity = new Song(null,null,null,null,null,null);
        $this->factory = new SongFactory();

        parent::__construct($db);
    }

}