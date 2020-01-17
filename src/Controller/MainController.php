<?php

namespace App\Controller;

use App\Entity\Farfor;
use App\Form\FarforType;
use App\Entity\Image;
use App\Controller\FarforController;
use App\Controller\CSSController;
use App\Repository\FarforRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()

    {
        return $this->render('main/1.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

}
