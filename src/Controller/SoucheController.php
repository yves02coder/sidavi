<?php

namespace App\Controller;

use App\Entity\Souche;
use App\Form\SoucheType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/souche')]
class SoucheController extends AbstractController
{
    #[Route('/', name: 'souche_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $souches = $entityManager
            ->getRepository(Souche::class)
            ->findAll();

        return $this->render('souche/index.html.twig', [
            'souches' => $souches,
        ]);
    }

    #[Route('/new', name: 'souche_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $souche = new Souche();
        $form = $this->createForm(SoucheType::class, $souche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($souche);
            $entityManager->flush();

            return $this->redirectToRoute('souche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('souche/new.html.twig', [
            'souche' => $souche,
            'form' => $form,
        ]);
    }

    #[Route('/{idSouche}', name: 'souche_show', methods: ['GET'])]
    public function show(Souche $souche): Response
    {
        return $this->render('souche/show.html.twig', [
            'souche' => $souche,
        ]);
    }

    #[Route('/{idSouche}/edit', name: 'souche_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Souche $souche, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SoucheType::class, $souche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('souche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('souche/edit.html.twig', [
            'souche' => $souche,
            'form' => $form,
        ]);
    }

    #[Route('/{idSouche}', name: 'souche_delete', methods: ['POST'])]
    public function delete(Request $request, Souche $souche, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$souche->getIdSouche(), $request->request->get('_token'))) {
            $entityManager->remove($souche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('souche_index', [], Response::HTTP_SEE_OTHER);
    }
}
