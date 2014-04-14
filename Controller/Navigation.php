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
            'active_class' => 'active'
        ],
        [
            'text' => '<i class="fa fa-align-justify"></i> Playlist',
            'url' => '/Playlist',
            'active_class' => 'active'
        ],
        [
            'text' => '<i class="fa fa-users"></i> Users',
            'url' => '/Users',
            'active_class' => 'active'
        ],
        [
            'text' => '<i class="fa fa-music"></i> Add Music',
            'url' => '/AddMusic',
            'active_class' => 'active'
        ],
        [
            'text' => '<i class="fa fa-cogs"></i> Settings',
            'url' => '/Settings',
            'active_class' => 'active'
        ]
    ];

    public static function  getNavigation($url = ''){
        foreach (self::$navigation as &$link) {
            if (preg_match(':^'.$url.'$:', $link['url'])){
                $link['active'] = 'active';
            }
        }
        return self::$navigation;
    }
} 