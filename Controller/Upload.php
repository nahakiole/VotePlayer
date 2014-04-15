<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 15.04.14
 * Time: 12:19
 */

namespace Controller;


use Fredy\Controller\Controller;
use Fredy\View\HTMLResponse;

class Upload extends Controller
{

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $request->SESSION['test'] = 'Hello';
        $response = new HTMLResponse('upload.twig');
        $response->setTwigVariables([
            'navigation' => Navigation::getNavigation($request->matches[0])
        ]
        );
        return $response;
    }
}