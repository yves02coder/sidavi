<?php

namespace App\Controller;

use App\Entity\Suivi;
use App\Form\SuiviType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/suivi')]
class SuiviController extends AbstractController
{
    #[Route('/', name: 'suivi_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $suivis = $entityManager
            ->getRepository(Suivi::class)
            ->findAll();

        return $this->render('suivi/index.html.twig', [
            'suivis' => $suivis,
        ]);
    }

    #[Route('/new', name: 'suivi_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $suivi = new Suivi();
        $form = $this->createForm(SuiviType::class, $suivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($suivi);
            $entityManager->flush();

            return $this->redirectToRoute('suivi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suivi/new.html.twig', [
            'suivi' => $suivi,
            'form' => $form,
        ]);
    }

    #[Route('/{idSuivi}', name: 'suivi_show', methods: ['GET'])]
    public function show(Suivi $suivi): Response
    {
        return $this->render('suivi/show.html.twig', [
            'suivi' => $suivi,
        ]);
    }

    #[Route('/{idSuivi}/edit', name: 'suivi_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Suivi $suivi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SuiviType::class, $suivi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('suivi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suivi/edit.html.twig', [
            'suivi' => $suivi,
            'form' => $form,
        ]);
    }

    #[Route('/{idSuivi}', name: 'suivi_delete', methods: ['POST'])]
    public function delete(Request $request, Suivi $suivi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suivi->getIdSuivi(), $request->request->get('_token'))) {
            $entityManager->remove($suivi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('suivi_index', [], Response::HTTP_SEE_OTHER);
    }
}
