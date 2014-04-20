<?php

namespace Model\Entity;

use  Fredy\Model\Entity\DataType\Id;
use Fredy\Model\Entity\DataType\Integer;
use Fredy\Model\Entity\DataType\Password;
use  Fredy\Model\Entity\DataType\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class User extends Entity
{

    function __construct($id, $username, $password)
    {
        $this->addField(new Field('id', new Integer(), 'input', true, $id, 3));
        $this->addField(new Field('username', new Text(1,255), 'textarea', true, $username, 1));
        $this->addField(new Field('password', new Password(6), 'textarea', true, $password, 2));
        parent::__construct();
    }

}
