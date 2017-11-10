<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 10/11/17
 * Time: 09:39
 */

namespace WCSBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use WCSBundle\Entity\Child;
use WCSBundle\Repository\ChildRepository;
use WCSBundle\Repository\continentRepository;
use WCSBundle\WCSBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class ElfeController extends Controller
{
    /**
     * @Route("List", name="List")
     */
    public function listAction()
    {
        $buildManager = $this->getDoctrine()->getManager();

        if (!empty($_POST['submit'])){
            if ($_POST['bool'] == 0){
                $em = $this->getDoctrine()->getManager();
                $build = $buildManager->getRepository('WCSBundle:Gift')->find($_POST['build']);
                $build->setBuild(1);
                $em->flush();

            }
        }

        $continentManager = $this->getDoctrine()->getManager();
        $continents = $continentManager->getRepository('WCSBundle:Continent')->findAll();

        return $this->render('WCSBundle:Elfe:List.html.twig', [
            'continents' => $continents,
        ]);
    }
}