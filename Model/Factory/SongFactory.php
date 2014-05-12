<?php


namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\Song;
use Model\Entity\User;

class SongFactory extends Factory
{

    /**
     * @param $data
     * @return Song
     */
    public function build($data)
    {
        return new Song($data['id'], $data['name'], $data['path']);
    }
}