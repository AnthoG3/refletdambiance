<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminInspirationController extends AbstractController
{
    #[Route('/Admin/inspiration', name: 'app_inspiration')]
    public function index(): Response
    {
        return $this->render('inspiration/index.html.twig', [
            'controller_name' => 'InspirationController',
        ]);
    }
}
