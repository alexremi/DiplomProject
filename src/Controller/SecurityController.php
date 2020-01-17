<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();

        $lastUsername = $utils->getLastUsername();

        return $this->render('security/index.html.twig', [
            'error'           => $error,
            'last_username'   => $lastUsername,
        ]);
    }

   /**
     * @Route("/logout", name="logout")
     */
       public function logout()
       {
             return $this->render('security/index.html.twig', [
            'error'           => $error,
            'last_username'   => $lastUsername,
        ]);

       }
}
