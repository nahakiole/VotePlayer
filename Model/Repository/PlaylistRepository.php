<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 13.05.14
 * Time: 15:40
 */

namespace Model\Repository;


use Fredy\Model\Repository\Repository;
use Model\Entity\Playlist;
use Model\Factory\PlaylistFactory;

class PlaylistRepository extends Repository {
    /**
     * @var string
     */
    protected $tableName = 'playlist';

    /**
     * @param $db \PDO
     */
    public function __construct($db)
    {
        $this->entity = new Playlist(null,null,null,null);
        $this->factory = new PlaylistFactory();

        parent::__construct($db);
    }

} 