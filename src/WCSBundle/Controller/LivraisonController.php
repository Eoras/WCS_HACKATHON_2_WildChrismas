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
        $password = 'test';
        if (empty($_POST['submit']) or $_POST['pass'] != $password) {
            $error = "Tu n'es pas le Père Noël !";
            return $this->render('WCSBundle:Livraison:admin.html.twig', [
                'error' => $error,
            ]);
        }
        else {

            $continentManager = $this->getDoctrine()->getManager();
            $continents = $continentManager->getRepository('WCSBundle:Continent')->findAll();

            return $this->render('WCSBundle:Livraison:livraison.html.twig', [
                'continents' => $continents,
            ]);
        }
    }
}