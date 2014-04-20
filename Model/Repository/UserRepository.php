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
        $this->entity = new User(null,null,null);
        $this->factory = new UserFactory();

        parent::__construct($db);
    }

}