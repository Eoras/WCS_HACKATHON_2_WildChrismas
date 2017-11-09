<?php

namespace WCSBundle\Controller;

use WCSBundle\Entity\child;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Children controller.
 *
 * @Route("child")
 */
class childController extends Controller
{
    /**
     * Lists all child entities.
     *
     * @Route("/", name="child_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $childs = $em->getRepository('Child.php')->findAll();

        return $this->render('child/index.html.twig', array(
            'childs' => $childs,
        ));
    }

    /**
     * Creates a new child entity.
     *
     * @Route("/new", name="child_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $child = new child();
        $form = $this->createForm('WCSBundle\Form\childType', $child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($child);
            $em->flush();

            return $this->redirectToRoute('child_show', array('id' => $child->getId()));
        }

        return $this->render('child/new.html.twig', array(
            'child' => $child,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a child entity.
     *
     * @Route("/{id}", name="child_show")
     * @Method("GET")
     */
    public function showAction(child $child)
    {
        $deleteForm = $this->createDeleteForm($child);

        return $this->render('child/show.html.twig', array(
            'child' => $child,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing child entity.
     *
     * @Route("/{id}/edit", name="child_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, child $child)
    {
        $deleteForm = $this->createDeleteForm($child);
        $editForm = $this->createForm('WCSBundle\Form\childType', $child);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('child_edit', array('id' => $child->getId()));
        }

        return $this->render('child/edit.html.twig', array(
            'child' => $child,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a child entity.
     *
     * @Route("/{id}", name="child_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, child $child)
    {
        $form = $this->createDeleteForm($child);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($child);
            $em->flush();
        }

        return $this->redirectToRoute('child_index');
    }

    /**
     * Creates a form to delete a child entity.
     *
     * @param child $child The child entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(child $child)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('child_delete', array('id' => $child->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
