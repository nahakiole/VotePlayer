<?php


namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\Album;

class AlbumFactory extends Factory
{

    /**
     * @param $data
     * @return Album
     */
    public function build($data)
    {
        return new Album($data['id'], $data['name'], $data['year'], $data['interpret']);
    }
}