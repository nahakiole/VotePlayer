<?php


namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\Song;

class SongFactory extends Factory
{

    /**
     * @param $data
     * @return Song
     */
    public function build($data)
    {
        return new Song($data['id'], $data['title'], $data['interpret'], $data['album'],$data['genre'], $data['length']);
    }
}