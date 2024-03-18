<?php

namespace App\Controller;

use App\Entity\ExamnsType;
use App\Form\ExamnsTypeType;
use App\Repository\ExamnsTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/examns-types')]
class ExamnsTypesController extends AbstractController
{
    #[Route('/', name: 'app_examns_types_index', methods: ['GET'])]
    public function index(ExamnsTypeRepository $examnsTypeRepository): Response
    {
        return $this->render('examns_types/index.html.twig', [
            'examns_types' => $examnsTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_examns_types_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $examnsType = new ExamnsType();
        $form = $this->createForm(ExamnsTypeType::class, $examnsType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $examnsType->setCreatedBy('system');
            $examnsType->setCreatedAt(new \DateTime());
            $entityManager->persist($examnsType);
            $entityManager->flush();

            return $this->redirectToRoute('app_examns_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('examns_types/new.html.twig', [
            'examns_type' => $examnsType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_examns_types_show', methods: ['GET'])]
    public function show(ExamnsType $examnsType): Response
    {
        return $this->render('examns_types/show.html.twig', [
            'examns_type' => $examnsType,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_examns_types_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ExamnsType $examnsType, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExamnsTypeType::class, $examnsType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $examnsType->setUpdatedBy('system');
            $examnsType->setUpdatedAt(new \DateTime());
            $entityManager->flush();

            return $this->redirectToRoute('app_examns_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('examns_types/edit.html.twig', [
            'examns_type' => $examnsType,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_examns_types_delete', methods: ['POST'])]
    public function delete(Request $request, ExamnsType $examnsType, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$examnsType->getId(), $request->request->get('_token'))) {
            $entityManager->remove($examnsType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_examns_types_index', [], Response::HTTP_SEE_OTHER);
    }
}
