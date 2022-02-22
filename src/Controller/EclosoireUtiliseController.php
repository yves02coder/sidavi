<?php

namespace App\Controller;

use App\Entity\EclosoireUtilise;
use App\Form\EclosoireUtiliseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/eclosoire/utilise')]
class EclosoireUtiliseController extends AbstractController
{
    #[Route('/', name: 'eclosoire_utilise_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $eclosoireUtilises = $entityManager
            ->getRepository(EclosoireUtilise::class)
            ->findAll();

        return $this->render('eclosoire_utilise/index.html.twig', [
            'eclosoire_utilises' => $eclosoireUtilises,
        ]);
    }

    #[Route('/new', name: 'eclosoire_utilise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $eclosoireUtilise = new EclosoireUtilise();
        $form = $this->createForm(EclosoireUtiliseType::class, $eclosoireUtilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($eclosoireUtilise);
            $entityManager->flush();

            return $this->redirectToRoute('eclosoire_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eclosoire_utilise/new.html.twig', [
            'eclosoire_utilise' => $eclosoireUtilise,
            'form' => $form,
        ]);
    }

    #[Route('/{idEclosoireUtilise}', name: 'eclosoire_utilise_show', methods: ['GET'])]
    public function show(EclosoireUtilise $eclosoireUtilise): Response
    {
        return $this->render('eclosoire_utilise/show.html.twig', [
            'eclosoire_utilise' => $eclosoireUtilise,
        ]);
    }

    #[Route('/{idEclosoireUtilise}/edit', name: 'eclosoire_utilise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EclosoireUtilise $eclosoireUtilise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EclosoireUtiliseType::class, $eclosoireUtilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('eclosoire_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('eclosoire_utilise/edit.html.twig', [
            'eclosoire_utilise' => $eclosoireUtilise,
            'form' => $form,
        ]);
    }

    #[Route('/{idEclosoireUtilise}', name: 'eclosoire_utilise_delete', methods: ['POST'])]
    public function delete(Request $request, EclosoireUtilise $eclosoireUtilise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eclosoireUtilise->getIdEclosoireUtilise(), $request->request->get('_token'))) {
            $entityManager->remove($eclosoireUtilise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eclosoire_utilise_index', [], Response::HTTP_SEE_OTHER);
    }
}
