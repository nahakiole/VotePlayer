<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 14.04.14
 * Time: 14:05
 */

namespace Controller;


class Navigation {

    private static  $navigation = [
        [
            'text' => '<i class="fa fa-home"></i> Home',
            'url' => '/',
            'active_class' => 'active',
            'id' => 'home'
        ],
        [
            'text' => '<i class="fa fa-align-justify"></i> Playlist',
            'url' => '/Playlist',
            'active_class' => 'active',
            'id' => 'playlist'
        ],
        [
            'text' => '<i class="fa fa-users"></i> Users',
            'url' => '/Users',
            'active_class' => 'active',
            'id' => 'users'
        ],
        [
            'text' => '<i class="fa fa-music"></i> Add Music',
            'url' => '/AddMusic',
            'active_class' => 'active',
            'id' => 'addmusic'
        ],
        [
            'text' => '<i class="fa fa-cogs"></i> Settings',
            'url' => '/Settings',
            'active_class' => 'active',
            'id' => 'settings'
        ]
    ];

    public static function  getNavigation($active = ''){
        foreach (self::$navigation as &$link) {
            if ($link['id'] == $active){
                $link['active'] = 'active';
            }
        }
        return self::$navigation;
    }
} 