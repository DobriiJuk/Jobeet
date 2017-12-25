<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/category", name="cat_index")
     */
    public function indexAction(Request $request)
    {
        $query = $this->getDoctrine()->getRepository(Category::class)
            ->createQueryBuilder('category')
            ->getQuery();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 10,
            ['defaultSortFieldName' => 'category.id', 'defaultSortDirection' => 'asc']);


        return $this->render('AppBundle:category:index_cat.html.twig', array('pagination' => $pagination));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/new-category",name="cat_new")
     */
    public function newAction(Request $request)
    {
        $cat = new Category();
        $form = $this->createForm(CategoryType::class, $cat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('cat_show', ['id' => $cat->getId(),]);
        }

        return $this->render('AppBundle:category:new_cat.html.twig', ['cat' => $cat, 'form' => $form->createView(),]);
    }

    /**
     * @param Category $cat
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/category/{id}", name="cat_show")
     */
    public function showAction(Category $cat)
    {


        return $this->render('AppBundle:category:show_cat.html.twig',
            ['cat' => $cat
            ]);
    }

    /**
     * @param Request $request
     * @param Category $cat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/category/{id}/edit", name="cat_edit")
     */
    public function editAction(Request $request, Category $cat)
    {
        $formEdit = $this->createForm(CategoryType::class, $cat);
        $formEdit->handleRequest($request);

        if ($formEdit->isSubmitted() && $formEdit->isValid()) {
            $this->getDoctrine()->getManager()->persist($cat);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('cat_edit', ['id' => $cat->getId()]);
        }

        return $this->render('AppBundle:category:edit_cat.html.twig',
            ['cat' => $cat, 'formedit' => $formEdit->createView()]);
    }

    /**
     * @param Category $cat
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/category/{id}/delete", name="delete_cat")
     */
    public function deleteAction(Category $cat)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($cat);
        $em->flush();
        return $this->redirectToRoute('cat_index');
    }

}

