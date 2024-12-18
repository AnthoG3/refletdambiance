<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminRealisationController extends AbstractController
{
    #[Route('/realisation', name: 'app_realisation')]
    public function index(): Response
    {
        return $this->render('realisation/index.html.twig', [
            'controller_name' => 'RealisationController',
        ]);
    }
}
