<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contact;
use App\Form\ContactFormType;


class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    //SECTION MENTIONS LEGALES

    #[Route('/mentions_legales', name: 'mention')]
    public function mention(): Response
    {
        return $this->render('default/mention.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }



    #[Route('/les-tipis', name: 'teepee')]
    public function lesTipis(): Response
    {
        return $this->render('default/teepee.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }


    #[Route('/les-tipis/tipi-double', name: 'teepee_double')]
    public function tipiDouble(): Response
    {
        return $this->render('default/teepee_double.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/les-tipis/tipi-superieur', name: 'teepee_sup')]
    public function tipiSuperieur(): Response
    {
        return $this->render('default/teepee_sup.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/les-tipis/tipi-familial', name: 'teepee_family')]
    public function tipiFamiliale(): Response
    {
        return $this->render('default/teepee_family.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }



    #[Route('/espaces-communs', name: 'common')]
    public function espacesCommuns(): Response
    {
        return $this->render('default/common.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/activites', name: 'activities')]
    public function activities(): Response
    {
        return $this->render('default/activities.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }


    #[Route('/nos-services', name: 'services')]
    public function nosServices(): Response
    {
        return $this->render('default/services.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/a-propos', name: 'about')]
    public function about(): Response
    {
        return $this->render('default/about.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/tarifs', name: 'rate')]
    public function rate(): Response
    {
        return $this->render('default/rate.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/nous-contacter', name: 'contact')]
    public function contactUs(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($contact);
            $entityManager->flush();



            return $this->redirectToRoute('contact');
        }

        return $this->render('default/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
