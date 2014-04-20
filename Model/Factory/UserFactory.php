<?php


namespace Model\Factory;


use Fredy\Model\Factory\Factory;
use Model\Entity\User;

class UserFactory extends Factory
{

    /**
     * @param $data
     * @return Journal
     */
    public function build($data)
    {
        return new User($data['id'], $data['username'], $data['password']);
    }
}