<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Entity\Facture;
use App\Entity\Reservation;
use App\Form\CalendarType;
use App\Form\FactureType;
use App\Repository\CalendarRepository;
use App\Repository\FactureRepository;
use App\Repository\ReservationRepository;
use DateInterval;
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
    public function index(CalendarRepository $calendar): Response
    {
        $events = $calendar->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }

        $data = json_encode($rdvs);


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'data' =>$data
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
