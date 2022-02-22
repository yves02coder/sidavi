<?php

namespace App\Controller;

use App\Entity\IncubateurUtilise;
use App\Form\IncubateurUtiliseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/incubateur/utilise')]
class IncubateurUtiliseController extends AbstractController
{
    #[Route('/', name: 'incubateur_utilise_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $incubateurUtilises = $entityManager
            ->getRepository(IncubateurUtilise::class)
            ->findAll();

        return $this->render('incubateur_utilise/index.html.twig', [
            'incubateur_utilises' => $incubateurUtilises,
        ]);
    }

    #[Route('/new', name: 'incubateur_utilise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $incubateurUtilise = new IncubateurUtilise();
        $form = $this->createForm(IncubateurUtiliseType::class, $incubateurUtilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($incubateurUtilise);
            $entityManager->flush();

            return $this->redirectToRoute('incubateur_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('incubateur_utilise/new.html.twig', [
            'incubateur_utilise' => $incubateurUtilise,
            'form' => $form,
        ]);
    }

    #[Route('/{idIncubateurUtilise}', name: 'incubateur_utilise_show', methods: ['GET'])]
    public function show(IncubateurUtilise $incubateurUtilise): Response
    {
        return $this->render('incubateur_utilise/show.html.twig', [
            'incubateur_utilise' => $incubateurUtilise,
        ]);
    }

    #[Route('/{idIncubateurUtilise}/edit', name: 'incubateur_utilise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, IncubateurUtilise $incubateurUtilise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(IncubateurUtiliseType::class, $incubateurUtilise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('incubateur_utilise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('incubateur_utilise/edit.html.twig', [
            'incubateur_utilise' => $incubateurUtilise,
            'form' => $form,
        ]);
    }

    #[Route('/{idIncubateurUtilise}', name: 'incubateur_utilise_delete', methods: ['POST'])]
    public function delete(Request $request, IncubateurUtilise $incubateurUtilise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$incubateurUtilise->getIdIncubateurUtilise(), $request->request->get('_token'))) {
            $entityManager->remove($incubateurUtilise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('incubateur_utilise_index', [], Response::HTTP_SEE_OTHER);
    }
}
