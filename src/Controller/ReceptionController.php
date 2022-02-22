<?php

namespace App\Controller;

use App\Entity\Reception;
use App\Form\ReceptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reception')]
class ReceptionController extends AbstractController
{
    #[Route('/', name: 'reception_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $receptions = $entityManager
            ->getRepository(Reception::class)
            ->findAll();

        return $this->render('reception/index.html.twig', [
            'receptions' => $receptions,
        ]);
    }

    #[Route('/new', name: 'reception_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reception = new Reception();
        $form = $this->createForm(ReceptionType::class, $reception);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reception);
            $entityManager->flush();

            return $this->redirectToRoute('reception_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reception/new.html.twig', [
            'reception' => $reception,
            'form' => $form,
        ]);
    }

    #[Route('/{idReception}', name: 'reception_show', methods: ['GET'])]
    public function show(Reception $reception): Response
    {
        return $this->render('reception/show.html.twig', [
            'reception' => $reception,
        ]);
    }

    #[Route('/{idReception}/edit', name: 'reception_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reception $reception, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReceptionType::class, $reception);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('reception_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reception/edit.html.twig', [
            'reception' => $reception,
            'form' => $form,
        ]);
    }

    #[Route('/{idReception}', name: 'reception_delete', methods: ['POST'])]
    public function delete(Request $request, Reception $reception, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reception->getIdReception(), $request->request->get('_token'))) {
            $entityManager->remove($reception);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reception_index', [], Response::HTTP_SEE_OTHER);
    }
}
