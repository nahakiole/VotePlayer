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
use Fredy\View\JSONResponse;

class Upload extends Controller
{

    /**
     * @param $request \Fredy\Model\Entity\Request
     * @return \Fredy\View\Response
     */
    function indexAction($request)
    {
        $response = new HTMLResponse('upload.twig');

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
    function uploadAction($request)
    {

        $handler = new UploadHandler([
            'upload_dir' => ROOTPATH.'/Music/',
            'upload_url' => OFFSETPATH.'/Music/',
        ]);
        die();

    }
}