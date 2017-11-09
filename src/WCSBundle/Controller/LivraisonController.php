<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 09/11/17
 * Time: 16:58
 */

namespace WCSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WCSBundle\Repository\continentRepository;



class LivraisonController extends Controller
{
    /**
     * @Route("/Livraison")
     */
    public function indexAction()
    {
        $continentManager = $this->getDoctrine()->getManager();
        $continents = $continentManager->getRepository('WCSBundle:Continent')->findAll();

        return $this->render('WCSBundle:Livraison:livraison.html.twig',[
            'continents' => $continents,
        ]);
    }

}