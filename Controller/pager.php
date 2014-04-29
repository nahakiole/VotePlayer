<?php
/**
 * Created by PhpStorm.
 * User: haesler
 * Date: 27.04.14
 * Time: 15:39
 */

namespace Controller;


class Pager {

    private $page = [];


    public function getPage($url = '', $activepage, $totalpage){
        for($i=1; $i <= $totalpage; $i++) {
            $this->page[] = array('url' => $url.'/'.$i,'active'=>'', 'total' => $totalpage, 'number' => $i);
        }

        foreach ($this->page as &$link) {

                if (preg_match(':^'.$link['url'].':', $url.'/'.$activepage)){
                $link['active'] = 'active';
            }
        }
        return $this->page;
    }
}