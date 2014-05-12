<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 12.05.14
 * Time: 23:24
 */

namespace Model\Entity;


use Fredy\Model\Entity\Datatype\Id;
use Fredy\Model\Entity\Datatype\Text;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class Song extends Entity {

    function __construct($id, $name, $path)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 3));
        $this->addField(new Field('name', new Text(), 'textarea', true, $name, 1));
        $this->addField(new Field('path', new Text(), 'textarea', true, $path, 2));
        parent::__construct();
    }
} 