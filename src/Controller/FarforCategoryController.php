<?php

namespace App\Controller;

use App\Entity\FarforCategory;
use App\Form\FarforCategoryType;
use App\Repository\FarforCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/farfor/category")
 */
class FarforCategoryController extends AbstractController
{
    /**
     * @Route("/", name="farfor_category_index", methods={"GET"})
     */
    public function index(FarforCategoryRepository $farforCategoryRepository): Response
    {
        return $this->render('farfor_category/index.html.twig', [
            'farfor_categories' => $farforCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="farfor_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $farforCategory = new FarforCategory();
        $form = $this->createForm(FarforCategoryType::class, $farforCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($farforCategory);
            $entityManager->flush();

            return $this->redirectToRoute('farfor_category_index');
        }

        return $this->render('farfor_category/new.html.twig', [
            'farfor_category' => $farforCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="farfor_category_show", methods={"GET"})
     */
    public function show(FarforCategory $farforCategory): Response
    {
        return $this->render('farfor_category/show.html.twig', [
            'farfor_category' => $farforCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="farfor_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FarforCategory $farforCategory): Response
    {
        $form = $this->createForm(FarforCategoryType::class, $farforCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('farfor_category_index', [
                'id' => $farforCategory->getId(),
            ]);
        }

        return $this->render('farfor_category/edit.html.twig', [
            'farfor_category' => $farforCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="farfor_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FarforCategory $farforCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$farforCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($farforCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('farfor_category_index');
    }
}
