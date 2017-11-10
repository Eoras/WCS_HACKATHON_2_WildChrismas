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
use Symfony\Component\HttpFoundation\Session\Session;


class LivraisonController extends Controller
{
    /**
     * @Route("/Livraison", name="livraison")
     */
    public function indexAction()
    {
        $session = new Session();
        $password = 'test';
        if (NULL !== $session->get("connect")) {

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

            return $this->render('WCSBundle:Livraison:livraison.html.twig', [
                'continents' => $continents,
            ]);

        } elseif (!empty($_POST['pass']) and ($_POST['pass'] == $password)) {
            $session->set('connect', 'connect');
            return $this->redirectToRoute('livraison');

        } else {
            $error = "ALORS PROUVEZ-LE";
            return $this->render('WCSBundle:Livraison:admin.html.twig', [
                'error' => $error,
            ]);
        }
    }

    private function createDeleteForm(Child $child)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('child_delete', array('id' => $child->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @Route("/Deconnection", name="deconnection")
     */
    public function disconnectAction()
    {
        $session = new Session();
        $session->clear();
        return $this->redirectToRoute('livraison');

    }

}