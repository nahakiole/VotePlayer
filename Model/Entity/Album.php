<?php

namespace Model\Entity;

use  Fredy\Model\Entity\DataType\Id;
use Fredy\Model\Entity\DataType\Integer;
use Fredy\Model\Entity\DataType\Password;
use  Fredy\Model\Entity\DataType\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class Album extends Entity
{

    function __construct($id, $name, $year, $interpret)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 3));
        $this->addField(new Field('name', new Text(1,255), 'input', true, $name, 1));
        $this->addField(new Field('year', new Integer(11), 'input', true, $year, 2));
        $this->addField(new Field('interpret', new Integer(11), 'input', true, $interpret, 4));
        parent::__construct();
    }

}
