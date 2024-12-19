<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private ContactController $contactController;
    private EntityManagerInterface $entityManager;

    public function __construct(ContactController $contactController, EntityManagerInterface $entityManager)
    {
        $this->contactController = $contactController;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(Request $request): Response
    {
        $contactFormData = $this->contactController->createContactForm($request, $this->entityManager);

        if (isset($contactFormData['success'])) {
            return $this->redirectToRoute('home');
        }

        return $this->render('home.html.twig', [
            'contactForm' => $contactFormData['form']->createView(),
        ]);
    }
}
