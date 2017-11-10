<?php
/**
 * Created by PhpStorm.
 * User: wilder5
 * Date: 09/11/17
 * Time: 16:58
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



class LivraisonController extends Controller
{
    /**
     * @Route("/Livraison", name="livraison")
     */
    public function indexAction()
    {
        $password = 'test';
        if (empty($_POST['submit']) or $_POST['pass'] != $password) {
            $error = "Tu ne peut pas rentrer si tu n'es pas le Père Noël ! HO HO HO !!!";
            return $this->render('WCSBundle:Livraison:admin.html.twig', [
                'error' => $error
            ]);
        }
        else {

        if (!empty($_POST['id'])) {

            $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('WCSBundle:Child');

            $child = $repository->find($_POST['id']);

            $form = $this->createDeleteForm($child);

            $em = $this->getDoctrine()->getManager();
            $em->remove($child);
            $em->flush();


            return $this->redirectToRoute('livraison');
        }

        $continentManager = $this->getDoctrine()->getManager();
        $continents = $continentManager->getRepository('WCSBundle:Continent')->findAll();

            $continentManager = $this->getDoctrine()->getManager();
            $continents = $continentManager->getRepository('WCSBundle:Continent')->findAll();

            return $this->render('WCSBundle:Livraison:livraison.html.twig', [
                'continents' => $continents,
            ]);
        }
    }
    private function createDeleteForm(Child $child)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('child_delete', array('id' => $child->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

}