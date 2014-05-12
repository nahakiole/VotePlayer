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
use Model\Entity\Song;
use Model\Repository\SongRepository;

class Settings extends Controller
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
        $response = new HTMLResponse('settings.twig');
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
    function importAction($request)
    {
        $response = new HTMLResponse('import.twig');
        $navigation = new Navigation('navigation.json');

        $songRepository = new SongRepository($this->db);
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $files = [];
        if ($handle = opendir(ROOTPATH.'/Upload')) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != ".." && !is_dir(ROOTPATH.'Upload/'.$file && finfo_file($finfo, ROOTPATH.'Upload/'.$file) == 'audio/mpeg')) {
                    $song = new Song(null, $file, 'Music/'.$file);
                    $songRepository->create($song);
                    rename(ROOTPATH.'Upload/'.$file, ROOTPATH.'Music/'.$file);
                    $files[] = $song;

                }
            }
            closedir($handle);
        }


        $response->setTwigVariables([
                'navigation' => $navigation->getNavigation($request->matches[0]),
                'songs' => $files
            ]
        );
        return $response;
    }
}