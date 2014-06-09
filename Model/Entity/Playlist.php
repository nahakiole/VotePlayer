<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 13.05.14
 * Time: 15:33
 */

namespace Model\Entity;


use Fredy\Model\Entity\Datatype\Id;
use Fredy\Model\Entity\Datatype\Integer;
use Fredy\Model\Entity\Entity;
use Fredy\Model\Entity\Field;

class Playlist extends Entity {
    function __construct($id, $uid, $sid,$played)
    {
        $this->addField(new Field('id', new Id(), 'input', true, $id, 3));
        $this->addField(new Field('uid', new Integer(), 'textarea', true, $uid, 1));
        $this->addField(new Field('sid', new Integer(), 'textarea', true, $sid, 2));
        $this->addField(new Field('played', new Integer(), 'textarea', true, $played, 2));
        parent::__construct();
    }
} 