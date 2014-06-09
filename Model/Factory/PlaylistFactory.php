<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 13.05.14
 * Time: 15:38
 */

namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\Playlist;

class PlaylistFactory extends Factory {

    /**
     * @param $data
     * @return \Model\Entity\Entity
     */
    public function build($data)
    {
        return new Playlist($data['id'], $data['uid'], $data['sid'], $data['played']);
    }
}