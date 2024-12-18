<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InspirationController extends AbstractController
{
    #[Route('/inspiration', name: 'app_inspiration')]
    public function index(): Response
    {
        return $this->render('inspiration/index.html.twig', [
            'controller_name' => 'InspirationController',
        ]);
    }
}
