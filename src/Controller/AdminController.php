<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Farfor;
use App\Form\FarforType;
use App\Entity\Product;
use App\Form\ProductType;
use App\Controller\ProductController;
use App\Repository\ProductRepository;
use App\Entity\Image2;
use App\Entity\Image;
use App\Controller\FarforController;
use App\Repository\FarforRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

    /**
     * @Route("/adminpage", name="admin")
     */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="farfor_index", methods={"GET"})
     */
    public function index(FarforRepository $farforRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'farfors' => $farforRepository->findAll(),
        ]);
    }


    /**
     * @Route("/farfor", name="adminfarfor")
     */
    public function seefarfor(FarforRepository $farforRepository): Response
    {
        return $this->render('admin/indexfarfor.html.twig', [
            'controller_name' => 'AdminController',
            'farfors' => $farforRepository->findAll(),
        ]);
    }

    /**
     * @Route("/ceramic", name="adminceramic")
     */
    public function seeceramic(ProductRepository $productRepository): Response
    {
        return $this->render('admin/indexceramic.html.twig', [
            'controller_name' => 'AdminController',
            'products' => $productRepository->findAll(),
        ]);
    }

}
