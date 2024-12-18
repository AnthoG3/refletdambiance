<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminFormuleController extends AbstractController
{
    #[Route('/admin/formule', name: 'app_admin_formule_index')]
    public function index(): Response
    {
        return $this->render('admin/formule/index.html.twig', [
            'controller_name' => 'adminFormuleController',
        ]);
    }
}
