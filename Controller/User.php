<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 15.04.14
 * Time: 12:43
 */

namespace Controller;


use Fredy\Controller\Controller;
use Fredy\View\HTMLResponse;

class User extends Controller
{

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new HTMLResponse('users.twig');
        $response->setTwigVariables([
                'navigation' => Navigation::getNavigation($request->matches[0]),
                'text' => $request->SESSION['test']
            ]
        );
        return $response;
    }

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function loginAction($request)
    {
        $response = new HTMLResponse('login.twig');
        $response->setTwigVariables([
                'navigation' => Navigation::getNavigation($request->matches[0]),
                'text' => $request->SESSION['test']
            ]
        );
        return $response;
    }
}