<?php

namespace Controller;


use  Fredy\Configuration;
use Fredy\Controller\Controller;
use  Fredy\LanguageLoader;
use  Fredy\View\HTMLResponse;

class Demo extends Controller
{


    public function __construct($database, LanguageLoader $languageLoader)
    {
        $this->database = $database;
        $this->languageLoader = $languageLoader;
    }


    /**
     * @param $request \Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new HTMLResponse('demo.twig');
        //echo $languageContainer->getString('password_too_short');
        //echo $languageContainer->getStringWithAttributes('integer_min_max',[ 10, 11]);

        $response->setTwigVariables(
            [
                'title' => 'Demo',
                'navigation' => [
                    [
                        'text' => '<i class="fa fa-home"></i> Home',
                        'url' => '/',

                        'active' => 'active',
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
                ]
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