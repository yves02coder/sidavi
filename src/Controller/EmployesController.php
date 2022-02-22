<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employes')]
class EmployesController extends AbstractController
{
    #[Route('/', name: 'employes_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $employes = $entityManager
            ->getRepository(Employes::class)
            ->findAll();

        return $this->render('employes/index.html.twig', [
            'employes' => $employes,
        ]);
    }

    #[Route('/new', name: 'employes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employe = new Employes();
        $form = $this->createForm(EmployesType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();

            return $this->redirectToRoute('employes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employes/new.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{idEmploye}', name: 'employes_show', methods: ['GET'])]
    public function show(Employes $employe): Response
    {
        return $this->render('employes/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{idEmploye}/edit', name: 'employes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employes $employe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployesType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('employes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employes/edit.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{idEmploye}', name: 'employes_delete', methods: ['POST'])]
    public function delete(Request $request, Employes $employe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getIdEmploye(), $request->request->get('_token'))) {
            $entityManager->remove($employe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('employes_index', [], Response::HTTP_SEE_OTHER);
    }
}
