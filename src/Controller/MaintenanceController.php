<?php

namespace App\Controller;

use App\Entity\Maintenance;
use App\Form\MaintenanceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/maintenance')]
class MaintenanceController extends AbstractController
{
    #[Route('/', name: 'maintenance_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $maintenances = $entityManager
            ->getRepository(Maintenance::class)
            ->findAll();

        return $this->render('maintenance/index.html.twig', [
            'maintenances' => $maintenances,
        ]);
    }

    #[Route('/new', name: 'maintenance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $maintenance = new Maintenance();
        $form = $this->createForm(MaintenanceType::class, $maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($maintenance);
            $entityManager->flush();

            return $this->redirectToRoute('maintenance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('maintenance/new.html.twig', [
            'maintenance' => $maintenance,
            'form' => $form,
        ]);
    }

    #[Route('/{idMaintenance}', name: 'maintenance_show', methods: ['GET'])]
    public function show(Maintenance $maintenance): Response
    {
        return $this->render('maintenance/show.html.twig', [
            'maintenance' => $maintenance,
        ]);
    }

    #[Route('/{idMaintenance}/edit', name: 'maintenance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Maintenance $maintenance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaintenanceType::class, $maintenance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('maintenance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('maintenance/edit.html.twig', [
            'maintenance' => $maintenance,
            'form' => $form,
        ]);
    }

    #[Route('/{idMaintenance}', name: 'maintenance_delete', methods: ['POST'])]
    public function delete(Request $request, Maintenance $maintenance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maintenance->getIdMaintenance(), $request->request->get('_token'))) {
            $entityManager->remove($maintenance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('maintenance_index', [], Response::HTTP_SEE_OTHER);
    }
}
