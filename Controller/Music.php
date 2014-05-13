<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 17.04.14
 * Time: 11:51
 */

namespace Controller;


use Fredy\Controller\Controller;
use Fredy\View\HTMLResponse;
use Fredy\View\JSONResponse;

class Music extends Controller {

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new JSONResponse('music.twig');
        $files = [];
        if ($handle = opendir(ROOTPATH.'/Music')) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && !is_dir(ROOTPATH.'Music/'.$file)) {
                    $files[] =  'Music/'.$file;
                }
            }
            closedir($handle);
        }

        $file = array_rand($files);

        $response->setTwigVariables([
           'json' => [
               'song' => $files[$file]
           ]
        ]);
        return $response;
    }

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function playMusicAction($request){
        $response = new HTMLResponse('player.twig');
        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables(
            [
                'navigation' => $navigation->getNavigation($request->matches[0])
            ]
        );

        return $response;
    }
}