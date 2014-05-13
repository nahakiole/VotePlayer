<?php
/**
 * Created by PhpStorm.
 * User: robin
 * Date: 13.05.14
 * Time: 13:55
 */

namespace Test;

require_once 'PreTest.php';
use Controller\Pager;

class PagerTest extends \PHPUnit_Framework_TestCase {

    public function testPaging()
    {
        $pages = 10;
        $activePage = 5;
        $url = '/test';
        $pager = new Pager();
        $paging = $pager->getPage($url,$activePage,$pages);
        $this->assertStringMatchesFormat('active',$paging[$activePage-1]['active']);
        $this->assertStringMatchesFormat('/test/'.$activePage,$paging[$activePage-1]['url']);
        $this->assertStringMatchesFormat('',$paging[$activePage-2]['active']);
        $this->assertStringMatchesFormat('',$paging[$activePage+1]['active']);

    }
}
 