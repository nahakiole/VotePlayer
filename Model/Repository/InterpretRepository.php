<?php

namespace Model\Repository;

use Model\Entity\Interpret;
use Fredy\Model\Repository\Repository;
use Model\Factory\InterpretFactory;

class InterpretRepository extends Repository
{

    /**
     * @var string
     */
    protected $tableName = 'interpret';

    /**
     * @param $db \PDO
     */
    public function __construct($db)
    {
        $this->entity = new Interpret(null,null);
        $this->factory = new InterpretFactory();

        parent::__construct($db);
    }

}