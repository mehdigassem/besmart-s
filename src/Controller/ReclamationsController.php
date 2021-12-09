<?php

namespace App\Controller;
use App\Repository\ClientrecRepository;
use mgilet\NotificationBundle\Controller;
use App\Entity\Clientrec;
use App\Form\ClientrecType;
use Doctrine\DBAL\Types\TextType;
//use mysql_xdevapi\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Mgilet\NotificationBundle\Entity\Notification;
use Mgilet\NotificationBundle\NotifiableInterface;
use App\Form\Reclamation1Type;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @Route("/reclamations")
 */
class ReclamationsController extends AbstractController
{
    /**
     * @Route("/", name="reclamations_index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator) // Nous ajoutons les paramètres requis
    {

        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(Clientrec::class)->findAll();

        $clientrecs = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            2 // Nombre de résultats par page
        );

        return $this->render('reclamations/index.html.twig', [
            'clientrecs' => $clientrecs,
        ]);
    }

    /**
     * @Route("/new", name="reclamations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clientrec = new Clientrec();
        $form = $this->createForm(ClientrecType::class, $clientrec);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientrec->setDate(new \DateTime('now'));
            $clientrec->setEtat(' non traité ❌');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientrec);
            $entityManager->flush();

            return $this->redirectToRoute('reclamations_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('reclamations/new.html.twig', [
            // 'clientrec' => $clientrec,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reclamations_show", methods={"GET"})
     */
    public function show(Clientrec $clientrec): Response
    {
        return $this->render('reclamations/show.html.twig', [
            'clientrec' => $clientrec,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reclamations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clientrec $clientrec): Response
    {
        $form = $this->createForm(ClientrecType::class, $clientrec);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientrec->setEtat('traité ✅');
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclamations_index', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('reclamations/edit.html.twig', [
            'clientrec' => $clientrec,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reclamations_delete", methods={"POST"})
     */
    public function delete(Request $request, Clientrec $clientrec): Response
    {
        if ($this->isCsrfTokenValid('delete' . $clientrec->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clientrec);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reclamations_index', [], Response::HTTP_SEE_OTHER);
    }


    /**
     * @Route("/{id}/email")
     */
    public function sendEmail(MailerInterface $mailer , Clientrec $clientrec): Response
    {
        $email = (new Email())

            ->from('khouloud.laajili@esprit.tn')
            ->to('laajili.khouloud12@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
                //
            ->subject('létat de votre réclamation')
            //->getTo($clientrec->getId())
            ->html('<p> votre réclamation est bien traité merci de visiter notre site de nouveau!</p>');

        $mailer->send($email);

        return $this->redirectToRoute('reclamations_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     *
     * @Route("/{notifiable}", name="notification_list")
     */

    public function sendNotification(Request $request): Response
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world!');
        $notif->setMessage('This a notification.');
        $notif->setLink('https://symfony.com/');
        // or the one-line method :
        //$manager->createNotification('Notification subject', 'Some random text', 'https://google.fr/');

        //you can add a notification to a list of entities
        // the third parameter `$flush` allows you to directly flush the entities
        $manager->addNotification(array($this->getUser()), Clientrec::CLASS, true);

        return $this->redirectToRoute('reclamations_index', [], Response::HTTP_SEE_OTHER);

    }
}



