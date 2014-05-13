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
        $userMessage = '';
        if(isset($request->SESSION['user_saved_message'])) {
             $userMessage = $request->SESSION['user_saved_message'];
             unset($request->SESSION['user_saved_message']);
         }

        $page = 1;
        if(isset($request->matches['page'])) {
            $page = intval($request->matches['page']);
        }
        $pager = new Pager();

        $user = $UserRepository->findAll(10,$page*10-10);


        $navigation = new Navigation('navigation.json');
        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'users' => $user,
                'pager' => $pager->getPage(OFFSETPATH."/Users",$page, ceil( $UserRepository->getCount()/10)),
                'userMessage' => $userMessage
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
        $UserRepository = new UserRepository($this->db);
        $error = '';
        $userMessage = '';
        if(isset($request->SESSION['user_saved_message'])) {
            $userMessage = $request->SESSION['user_saved_message'];
            unset($request->SESSION['user_saved_message']);
        }

        if(isset($request->POST["submit"])){
            $filter = new Filter($this->db);
            $filter->addCondition(new Condition('username','=',$request->POST['username']));
            $user = $UserRepository->findByFilter($filter,1);
            if((count($user) <> 1) || !password_verify ( $request->POST['password'], (string) $user[0]->password->value )) {
                $error = 'Login is incorrect!';
            }
            else
            {
                $request->SESSION['userID'] = $user[0]->id->value;
                return new RedirectResponse(OFFSETPATH."/Home");
            }


        }


        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'error' => $error,
                'userMessage' => $userMessage
            ]
        );
        return $response;

    }
    function registerAction($request)
    {
        $response = new HTMLResponse('register.twig');
        $UserRepository = new UserRepository($this->db);

        $currentUser = new \Model\Entity\User(null,null,null, 0);



        $navigation = new Navigation('navigation.json');
        $error = [];

        if(isset($request->POST["submit"])){

            if(strlen($request->POST["username"])== 0){
                $error['usernameEmpty'] = 'Username is empty';
            }
            elseif (!preg_match(":[A-Za-z0-9]+:", $request->POST["username"])){
                $error['usernameNotValid'] = 'Username not valid. You can use only characters and numbers.';
            }
            else
            {
                $currentUser['username']->value = $request->POST["username"];
            }



                if(strlen($request->POST["password"]) == 0){
                    $error['passwordEmpty'] = 'Password is empty';
                }
                elseif(strlen($request->POST["password"]) < 6){
                    $error['passwordLen'] = 'Password must have at least 6 Characters!';
                }
                else
                {
                    $currentUser['password']->value = password_hash($request->POST["password"], PASSWORD_DEFAULT);
                }


            if (count($error) > 0){

                $response->setTwigVariables([
                        'navigation' => $navigation->getNavigation($request->matches[0]),
                        'user' => $currentUser,
                        'error' => $error
                    ]
                );
                return $response;
            }
            else
            {
            $request->SESSION['user_saved_message'] = 'User saved!';
            $UserRepository->create($currentUser);

            return new RedirectResponse(OFFSETPATH."/Login");
            }

        }



        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'user' => $currentUser,
                'error' => $error
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
            $currentUser = $UserRepository->findById($request->matches['userid']);
            $userEditUrl = 'Edit/'.$request->matches['userid'];
        }
        else
        {
            $currentUser = new \Model\Entity\User(null,null,null, 0);
            $userEditUrl = 'Add';
        }



        $navigation = new Navigation('navigation.json');
        $error = [];

        if(isset($request->POST["submit"])){


            if(strlen($request->POST["username"])== 0){
                $error['usernameEmpty'] = 'Username is empty';
            }
            elseif (!preg_match(":[A-Za-z0-9]+:", $request->POST["username"])){
                $error['usernameNotValid'] = 'Username not valid. You can use only characters and numbers.';
            }
            else
            {
                $currentUser['username']->value = $request->POST["username"];
            }


            if(($request->POST["id"])> 0) {
                if(strlen($request->POST["password"])> 0){
                    if(strlen($request->POST["password"]) < 6){
                        $error['passwordLen'] = 'Password must have at least 6 Characters!';
                    }
                    else
                    {
                        $currentUser['password']->value = password_hash($request->POST["password"], PASSWORD_DEFAULT);
                    }
                }
                else
                {
                }


            }
            else
            {
                if(strlen($request->POST["password"]) == 0){
                    $error['passwordEmpty'] = 'Password is empty';
                }
                elseif(strlen($request->POST["password"]) < 6){
                    $error['passwordLen'] = 'Password must have at least 6 Characters!';
                }
                else
                {
                    $currentUser['password']->value = password_hash($request->POST["password"], PASSWORD_DEFAULT);
                }

            }
            if (count($error) > 0){

                $response->setTwigVariables([
                        'navigation' => $navigation->getNavigation($request->matches[0]),
                        'user' => $currentUser,
                        'error' => $error,
                        'userEditUrl' => $userEditUrl
                    ]
                );
                return $response;
            }
                else
                {
                    $request->SESSION['user_saved_message'] = 'User saved!';
                    if(isset($request->POST["id"])) {
                        $UserRepository->update($currentUser);
                    }
                    else
                    {
                        $UserRepository->create($currentUser);
                    }
                    return new RedirectResponse(OFFSETPATH."/Users");
                }
        }



        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'user' => $currentUser,
                'error' => $error,
                'userEditUrl' => $userEditUrl
            ]
        );
        return $response;
    }

}