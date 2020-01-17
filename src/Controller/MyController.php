<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MyController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
        return $this->render('my/index.html.twig', [
            'name' => $request->query->get('name'),
        ]);
    }
    /**
     * @Route("/api", name="api")
     */
   public function api(Request $request){
      return new JsonResponse([
        'content' => 'SUMMA: ' . ($request->query->getInt('a') + $request->query->getInt('b')),
      ]);
    }
}
