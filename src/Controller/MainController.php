<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Form\CalendarType;
use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/main")
 */

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(CalendarRepository $calendar ,Request $request): Response
    {
       /*
        * Parti form
        */
        $calender = new Calendar();
        $form = $this->createForm(CalendarType::class, $calender);
        $form->handleRequest($request);

        /*
         * submit form
         */
        if ($form->isSubmitted() && $form->isValid()) {
            $calender->setTitle('Quiz');
            $calender->setDescription('Quiz');
            $calender->setAllDay(false);
            $start = $request->request->get('calendar')['start']['date']." ".$request->request->get('calendar')['start']['time']['hour'].":".$request->request->get('calendar')['start']['time']['minute'];
            $date = date('Y-m-d H:m',strtotime($start.'+1 hour'));
            $calender->setEnd(new \DateTime($date));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calender);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }
        /*
         * creation calendar
         */

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

        return $this->render('calendar/calendar.html.twig',  [
            'calendar' => $calendar,
            'form' => $form->createView(),
            'data' =>$data
        ]);
    }
}