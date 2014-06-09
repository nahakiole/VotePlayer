<?php

namespace Controller;


use  Fredy\Configuration;
use Fredy\Controller\Controller;
use  Fredy\LanguageLoader;
use Fredy\Model\Repository\Condition;
use Fredy\Model\Repository\Filter;
use  Fredy\View\HTMLResponse;
use Model\Repository\PlaylistRepository;
use Model\Repository\SongRepository;
use Model\Repository\UserRepository;

class Overview extends Controller
{

    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }


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


        $playlistRepository = new PlaylistRepository($this->db);
        $filter = new Filter($this->db);
        $filter->addCondition(new Condition('played', '!=', '1'));
        $playlist = $playlistRepository->findByFilter($filter);
        $songs = [];
        $songRepository = new SongRepository($this->db);
        foreach ($playlist as $entry){
            $songs[] = $songRepository->findById($entry->sid->value);
        }


        $response->setTwigVariables(
            [
                'title' => 'Demo',
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'playlist' => $songs
            ]

        );
        return $response;

    }


    /**
     * @param $request \Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function showPlaylist($request)
    {
        $response = new HTMLResponse('subdomain.twig');
        $response->setTwigVariables(['subdomain' => $request->matches['subdomain']]);
        return $response;
    }
}