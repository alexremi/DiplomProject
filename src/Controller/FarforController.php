<?php

namespace App\Controller;

use App\Entity\Farfor;
use App\Form\FarforType;
use App\Entity\Image;
use App\Repository\FarforRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;




/**
 * @Route("/farfor")
 */
class FarforController extends AbstractController
{

    /**
     * @Route("/farfor1", name="farfor1_index", methods={"GET"})
     */
    public function index1(FarforRepository $farforRepository): Response
    {
        return $this->render('farfor/index1.html.twig', [
            'farfors' => $farforRepository->findAll(),
        ]);
    }


    /**
     * @Route("/", name="farfor_index", methods={"GET"})
     */
    public function index(FarforRepository $farforRepository): Response
    {
        return $this->render('farfor/index.html.twig', [
            'farfors' => $farforRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="farfor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $farfor = new Farfor();

        $form = $this->createForm(FarforType::class, $farfor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $files = $request->files->get('farfor')['images'];
	    
	    /** @var UploadedFile $file */
            foreach ($files as $file) {
		$image = new Image();

		$filename = md5(uniqid()) . $file->guessExtension();
		$image->setFilename($filename);

		$image->setPath(
		   '/uploads/' . $filename 
		);

		$file->move(
		  $this->getParameter('uploads'),
		  $filename
		);

		$image->setPost2($farfor);
		$farfor->addImage($image);

		$entityManager->persist($image);
		}
            $entityManager->persist($farfor);
            $entityManager->flush();

            return $this->redirectToRoute('farfor_index');
        }


        return $this->render('farfor/new.html.twig', [
            'farfor' => $farfor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="farfor_show", methods={"GET"})
     */
    public function show(Farfor $farfor): Response
    {
        return $this->render('farfor/show.html.twig', [
            'farfor' => $farfor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="farfor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Farfor $farfor): Response
    {
        $form = $this->createForm(FarforType::class, $farfor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('farfor_index', [
                'id' => $farfor->getId(),
            ]);
        }

        return $this->render('farfor/edit.html.twig', [
            'farfor' => $farfor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="farfor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Farfor $farfor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$farfor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($farfor);


            $entityManager->flush();
        }

        return $this->redirectToRoute('farfor_index');
    }
}
