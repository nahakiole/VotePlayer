<?php

namespace Model\Repository;

use Model\Entity\User;
use Fredy\Model\Repository\Repository;
use Model\Factory\UserFactory;

class UserRepository extends Repository
{

    /**
     * @var string
     */
    protected $tableName = 'user';

    /**
     * @param $db \PDO
     */
    public function __construct($db)
    {
        $this->entity = new User(null,null,null,null);
        $this->factory = new UserFactory();

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