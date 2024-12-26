<?php

namespace App\Controller\Admin;

use App\Entity\AdminDashboard;
use App\Form\AdminDashboardType;
use App\Repository\AdminDashboardRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/dashboard')]
final class AdminDashboardController extends AbstractController
{
    #[Route(name: 'app_admin_dashboard_index', methods: ['GET'])]
    public function index(AdminDashboardRepository $adminDashboardRepository): Response
    {
        return $this->render('admin_dashboard/index.html.twig', [
            'admin_dashboards' => $adminDashboardRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_dashboard_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adminDashboard = new AdminDashboard();
        $form = $this->createForm(AdminDashboardType::class, $adminDashboard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adminDashboard);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_dashboard_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/new.html.twig', [
            'admin_dashboard' => $adminDashboard,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_dashboard_show', methods: ['GET'])]
    public function show(AdminDashboard $adminDashboard): Response
    {
        return $this->render('admin_dashboard/show.html.twig', [
            'admin_dashboard' => $adminDashboard,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_dashboard_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AdminDashboard $adminDashboard, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdminDashboardType::class, $adminDashboard);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_dashboard_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_dashboard/edit.html.twig', [
            'admin_dashboard' => $adminDashboard,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_dashboard_delete', methods: ['POST'])]
    public function delete(Request $request, AdminDashboard $adminDashboard, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adminDashboard->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($adminDashboard);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_dashboard_index', [], Response::HTTP_SEE_OTHER);
    }
}
