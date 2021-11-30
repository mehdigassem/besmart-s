<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Reservation;
use App\Form\FactureType;
use App\Repository\FactureRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/facture", name="facture_index", methods={"GET"})
     */
    public function showFacture(FactureRepository $factureRepository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Facture::class);
        $facture = $repository->findAll();

        //$step = $facture->getReservation();
        dump($facture);
        //dump($step);

        return $this->render('admin/indexFacture.html.twig', [
            'factures' => $facture,
        ]);
    }


    /**
     * @Route("/reservation", name="reservation_index", methods={"GET"})
     */
    public function showReservation(ReservationRepository $reservationRepository): Response
    {
        dump($reservationRepository);

        $repository = $this->getDoctrine()->getRepository(Reservation::class);
        $reservation = $repository->findAll();
        return $this->render('admin/reservation.html.twig', [
            'reservations' => $reservation,
        ]);
    }


    /**
     * @Route("/facture/{id}", name="facture_show_front", methods={"GET"})
     */
    public function show(Facture $facture): Response
    {
        return $this->render('admin/showFacture.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/factur/new", name="facture_new_admin", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $facture = new Facture();
        $form = $this->createForm(FactureType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('facture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/newFacture.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }
}
