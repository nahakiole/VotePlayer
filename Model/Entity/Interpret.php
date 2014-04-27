<?php

namespace Model\Entity;

use  Fredy\Model\Entity\DataType\Id;
use  Fredy\Model\Entity\DataType\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class Interpret extends Entity
{

    function __construct($id, $name)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 2));
        $this->addField(new Field('name', new Text(1,255), 'input', true, $username, 1));
        parent::__construct();
    }

}
