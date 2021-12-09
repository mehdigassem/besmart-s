<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackfrontController extends AbstractController
{
    /**
     * @Route("/backfront", name="backfront")
     */
    public function index(): Response
    {
        return $this->render('back-front.html.twig', [
            'controller_name' => 'BackfrontController',
        ]);
    }
}
