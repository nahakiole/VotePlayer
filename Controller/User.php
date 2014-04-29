<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 15.04.14
 * Time: 12:43
 */

namespace Controller;


use Fredy\Controller\Controller;
use Fredy\Model\Repository\Condition;
use Fredy\Model\Repository\Filter;
use Fredy\View\HTMLResponse;
use Fredy\View\RedirectResponse;
use Model\Repository\JournalRepository;
use Model\Repository\UserRepository;
use Controller\Pager;

class User extends Controller
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
        $response = new HTMLResponse('users.twig');
        $UserRepository = new UserRepository($this->db);
        $user = $UserRepository->findAll(10);
        $page = 1;
        if(isset($request->matches['page'])) {
            $page = intval($request->matches['page']);
        }
        $pager = new Pager();


        if(isset($request->POST["submit"])){
            if(isset($request->POST["id"])) {
                $userupdate = new \Model\Entity\User($request->POST["id"],$request->POST["username"],password_hash($request->POST["password"], PASSWORD_DEFAULT));
                $UserRepository->update($userupdate);
            }
            else
            {
                $usercreate = new \Model\Entity\User(null,$request->POST["username"],password_hash($request->POST["password"], PASSWORD_DEFAULT));
                $UserRepository->create($usercreate);
            }
            return new RedirectResponse(OFFSETPATH."/Users");
        }

        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'users' => $user,
                'pager' => $pager->getPage(OFFSETPATH."/Users",$page,10)
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
        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0])
            ]
        );
        return $response;
    }

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function editAction($request)
    {
        $response = new HTMLResponse('user.twig');
        $UserRepository = new UserRepository($this->db);
        if(isset($request->matches['userid'])) {
            $userID = $UserRepository->findById($request->matches['userid']);
        }
        else
        {
            $userID = null;
        }

        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'user' => $userID
            ]
        );
        return $response;
    }
}