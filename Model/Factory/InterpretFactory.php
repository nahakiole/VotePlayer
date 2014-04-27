<?php


namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\Interpret;

class InterretFactory extends Factory
{

    /**
     * @param $data
     * @return Interpret
     */
    public function build($data)
    {
        return new Interpret($data['id'], $data['name']);
    }
}