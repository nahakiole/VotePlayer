<?php

namespace Model\Entity;

use  Fredy\Model\Entity\Datatype\Id;
use Fredy\Model\Entity\Datatype\Integer;
use Fredy\Model\Entity\Datatype\Password;
use  Fredy\Model\Entity\Datatype\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class User extends Entity
{

    function __construct($id, $username, $password, $admin)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 3));
        $this->addField(new Field('username', new Text(1,255), 'textarea', true, $username, 1));
        $this->addField(new Field('password', new Password(6), 'textarea', true, $password, 2));
        $this->addField(new Field('admin', new Integer(), 'input',true, $admin,4));
        parent::__construct();
    }

}
