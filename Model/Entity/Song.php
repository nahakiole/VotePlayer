<?php

namespace Model\Entity;

use  Fredy\Model\Entity\DataType\Id;
use Fredy\Model\Entity\DataType\Integer;
use  Fredy\Model\Entity\DataType\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class Song extends Entity
{

    function __construct($id, $title, $interpret, $album, $genre, $length)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 3));
        $this->addField(new Field('title', new Text(1,255), 'input', true, $title, 1));
        $this->addField(new Field('interpret', new Integer(11), 'input', true, $interpret, 2));
        $this->addField(new Field('album', new Integer(11), 'input', true, $album, 4));
        $this->addField(new Field('genre', new Integer(11), 'input', true, $genre, 5));
        $this->addField(new Field('length', new Integer(11), 'input', true, $length, 6));
        parent::__construct();
    }

}

