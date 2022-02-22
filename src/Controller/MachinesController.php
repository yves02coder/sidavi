<?php

namespace App\Controller;

use App\Entity\Machines;
use App\Form\MachinesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/machines')]
class MachinesController extends AbstractController
{
    #[Route('/', name: 'machines_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $machines = $entityManager
            ->getRepository(Machines::class)
            ->findAll();

        return $this->render('machines/index.html.twig', [
            'machines' => $machines,
        ]);
    }

    #[Route('/new', name: 'machines_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $machine = new Machines();
        $form = $this->createForm(MachinesType::class, $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($machine);
            $entityManager->flush();

            return $this->redirectToRoute('machines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('machines/new.html.twig', [
            'machine' => $machine,
            'form' => $form,
        ]);
    }

    #[Route('/{idMachine}', name: 'machines_show', methods: ['GET'])]
    public function show(Machines $machine): Response
    {
        return $this->render('machines/show.html.twig', [
            'machine' => $machine,
        ]);
    }

    #[Route('/{idMachine}/edit', name: 'machines_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Machines $machine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MachinesType::class, $machine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('machines_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('machines/edit.html.twig', [
            'machine' => $machine,
            'form' => $form,
        ]);
    }

    #[Route('/{idMachine}', name: 'machines_delete', methods: ['POST'])]
    public function delete(Request $request, Machines $machine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$machine->getIdMachine(), $request->request->get('_token'))) {
            $entityManager->remove($machine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('machines_index', [], Response::HTTP_SEE_OTHER);
    }
}
