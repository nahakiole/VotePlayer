<?php

namespace Model\Repository;

use Model\Entity\Song;
use Model\Entity\User;
use Fredy\Model\Repository\Repository;
use Model\Factory\SongFactory;
use Model\Factory\UserFactory;

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
        $this->entity = new Song(null,null,null);
        $this->factory = new SongFactory();

        parent::__construct($db);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        $query =
            'SELECT count(*) as count FROM ' .
            $this->tableName .
            ' ;';
        $statement = $this->database->prepare($query);
        $statement->execute();
        //var_dump($statement->fetchAll());
        return $statement->fetchAll()[0]['count'];
    }

}