<?php

namespace Controller;


use  Fredy\Configuration;
use Fredy\Controller\Controller;
use  Fredy\LanguageLoader;
use  Fredy\View\HTMLResponse;
use Model\Repository\UserRepository;

class Overview extends Controller
{




    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new HTMLResponse('overview.twig');
        //echo $languageContainer->getString('password_too_short');
        //echo $languageContainer->getStringWithAttributes('integer_min_max',[ 10, 11]);
        $navigation = new Navigation('navigation.json');

        $response->setTwigVariables(
            [
                'title' => 'Demo',
                'navigation' => $navigation->getNavigation($request->matches[0])
            ]

        );
        return $response;

    }


    /**
     * @param $request \Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function subdomainAction($request)
    {
        $response = new HTMLResponse('subdomain.twig');
        $response->setTwigVariables(['subdomain' => $request->matches['subdomain']]);
        return $response;
    }
}