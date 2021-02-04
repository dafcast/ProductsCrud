<?php

namespace App\Controller;

use App\Entity\Mailer;
use App\Form\MailerType;
use Symfony\Component\Mime\Email;
use App\Repository\MailerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/mailer")
 */

class MailerController extends AbstractController
{

    /**
     * @Route("/", name="mailer_index", methods={"GET"})
     */
    public function index(MailerRepository $mailerRepository): Response
    {
        return $this->render('mailer/index.html.twig', [
            'mailers' => $mailerRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="mailer_new", methods={"GET","POST"})
     */
    public function new(MailerInterface $mailersym, Request $request): Response
    {
        $mailer = new Mailer();
        $form = $this->createForm(MailerType::class, $mailer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mailer);
            $entityManager->flush();


            $email = (new Email())
            ->from('admin.planestic@udistrital.edu.co')
            ->to($mailer->getPara())
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($mailer->getAsunto())
            ->text($mailer->getMensaje());
            // ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailersym->send($email);

            return $this->redirectToRoute('product_index');
        }

        return $this->render('mailer/new.html.twig', [
            'mailer' => $mailer,
            'form' => $form->createView(),
        ]);
    }
}