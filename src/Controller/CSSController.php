<?php

namespace App\Controller;

use App\Entity\Farfor;
use App\Form\FarforType;
use App\Entity\Image;
use App\Controller\FarforController;
use App\Repository\FarforRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CSSController extends AbstractController
{
    /**
     * @Route("/public/css/style3.css", name="CSS")
     */
    public function index()

    {
        return $this->render('/../public/css/style3.css', [
            'controller_name' => 'CSSController',
        ]);
    }
}
