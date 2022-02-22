<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\PrestataireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/prestataire')]
class PrestataireController extends AbstractController
{
    #[Route('/', name: 'prestataire_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $prestataires = $entityManager
            ->getRepository(Prestataire::class)
            ->findAll();

        return $this->render('prestataire/index.html.twig', [
            'prestataires' => $prestataires,
        ]);
    }

    #[Route('/new', name: 'prestataire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestataire = new Prestataire();
        $form = $this->createForm(PrestataireType::class, $prestataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prestataire);
            $entityManager->flush();

            return $this->redirectToRoute('prestataire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prestataire/new.html.twig', [
            'prestataire' => $prestataire,
            'form' => $form,
        ]);
    }

    #[Route('/{idPrestataire}', name: 'prestataire_show', methods: ['GET'])]
    public function show(Prestataire $prestataire): Response
    {
        return $this->render('prestataire/show.html.twig', [
            'prestataire' => $prestataire,
        ]);
    }

    #[Route('/{idPrestataire}/edit', name: 'prestataire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prestataire $prestataire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrestataireType::class, $prestataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('prestataire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prestataire/edit.html.twig', [
            'prestataire' => $prestataire,
            'form' => $form,
        ]);
    }

    #[Route('/{idPrestataire}', name: 'prestataire_delete', methods: ['POST'])]
    public function delete(Request $request, Prestataire $prestataire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prestataire->getIdPrestataire(), $request->request->get('_token'))) {
            $entityManager->remove($prestataire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prestataire_index', [], Response::HTTP_SEE_OTHER);
    }
}
