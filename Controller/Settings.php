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

class Settings extends Controller
{

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new HTMLResponse('settings.twig');
        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0])
            ]
        );
        return $response;
    }
}