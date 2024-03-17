<?php

namespace App\Controller;

use App\Entity\Examns;
use App\Form\_ExamnsType;
use App\Repository\ExamnsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/examns')]
class ExamnsController extends AbstractController
{
    #[Route('/', name: 'app_examns_index', methods: ['GET'])]
    public function index(ExamnsRepository $examnsRepository): Response
    {
        return $this->render('examns/index.html.twig', [
            'examns' => $examnsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_examns_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $examn = new Examns();
        $form = $this->createForm(_ExamnsType::class, $examn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($examn);
            $entityManager->flush();

            return $this->redirectToRoute('app_examns_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('examns/new.html.twig', [
            'examn' => $examn,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_examns_show', methods: ['GET'])]
    public function show(Examns $examn): Response
    {
        return $this->render('examns/show.html.twig', [
            'examn' => $examn,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_examns_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Examns $examn, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(_ExamnsType::class, $examn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_examns_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('examns/edit.html.twig', [
            'examn' => $examn,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_examns_delete', methods: ['POST'])]
    public function delete(Request $request, Examns $examn, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$examn->getId(), $request->request->get('_token'))) {
            $entityManager->remove($examn);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_examns_index', [], Response::HTTP_SEE_OTHER);
    }
}
