<?php

namespace App\Controller;

use App\Entity\FournisseurSouche;
use App\Form\FournisseurSoucheType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fournisseur/souche')]
class FournisseurSoucheController extends AbstractController
{
    #[Route('/', name: 'fournisseur_souche_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $fournisseurSouches = $entityManager
            ->getRepository(FournisseurSouche::class)
            ->findAll();

        return $this->render('fournisseur_souche/index.html.twig', [
            'fournisseur_souches' => $fournisseurSouches,
        ]);
    }

    #[Route('/new', name: 'fournisseur_souche_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fournisseurSouche = new FournisseurSouche();
        $form = $this->createForm(FournisseurSoucheType::class, $fournisseurSouche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fournisseurSouche);
            $entityManager->flush();

            return $this->redirectToRoute('fournisseur_souche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fournisseur_souche/new.html.twig', [
            'fournisseur_souche' => $fournisseurSouche,
            'form' => $form,
        ]);
    }

    #[Route('/{idFourniSche}', name: 'fournisseur_souche_show', methods: ['GET'])]
    public function show(FournisseurSouche $fournisseurSouche): Response
    {
        return $this->render('fournisseur_souche/show.html.twig', [
            'fournisseur_souche' => $fournisseurSouche,
        ]);
    }

    #[Route('/{idFourniSche}/edit', name: 'fournisseur_souche_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FournisseurSouche $fournisseurSouche, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FournisseurSoucheType::class, $fournisseurSouche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('fournisseur_souche_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fournisseur_souche/edit.html.twig', [
            'fournisseur_souche' => $fournisseurSouche,
            'form' => $form,
        ]);
    }

    #[Route('/{idFourniSche}', name: 'fournisseur_souche_delete', methods: ['POST'])]
    public function delete(Request $request, FournisseurSouche $fournisseurSouche, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fournisseurSouche->getIdFourniSche(), $request->request->get('_token'))) {
            $entityManager->remove($fournisseurSouche);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fournisseur_souche_index', [], Response::HTTP_SEE_OTHER);
    }
}
