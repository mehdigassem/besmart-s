<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasefrontController extends AbstractController
{
    /**
     * @Route("/basefront", name="basefront")
     */
    public function index(): Response
    {
        return $this->render('base-front.html.twig', [
            'controller_name' => 'Base-frontController',
        ]);
    }
}
