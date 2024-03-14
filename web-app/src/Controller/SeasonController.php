<?php

namespace App\Controller;

use App\Entity\Season;
use App\Form\SeasonType;
use App\Repository\SeasonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/season')]
class SeasonController extends AbstractController
{
  #[Route('/', name: 'app_season_index', methods: ['GET'])]
  public function index(SeasonRepository $seasonRepository): Response
  {
    return $this->render('season/index.html.twig', [
      'seasons' => $seasonRepository->findAll(),
    ]);
  }

  #[Route('/new', name: 'app_season_new', methods: ['GET', 'POST'])]
  public function new(Request $request, EntityManagerInterface $entityManager): Response
  {
    $season = new Season();

    $form = $this->createForm(SeasonType::class, $season);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $season->setCreatedBy('system');
      $season->setCreatedAt(new \DateTime());
      $entityManager->persist($season);
      $entityManager->flush();

      return $this->redirectToRoute('app_season_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('season/new.html.twig', [
      'season' => $season,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_season_show', methods: ['GET'])]
  public function show(Season $season): Response
  {
    return $this->render('season/show.html.twig', [
      'season' => $season,
    ]);
  }

  #[Route('/{id}/edit', name: 'app_season_edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, Season $season, EntityManagerInterface $entityManager): Response
  {
    // error_log(print_r($season, true));
    $form = $this->createForm(SeasonType::class, $season);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $season->setUpdatedBy('system');
      $season->setUpdatedAt(new \DateTime());
      $entityManager->flush();

      return $this->redirectToRoute('app_season_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('season/edit.html.twig', [
      'season' => $season,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_season_delete', methods: ['POST'])]
  public function delete(Request $request, Season $season, EntityManagerInterface $entityManager): Response
  {
    if ($this->isCsrfTokenValid('delete' . $season->getId(), $request->request->get('_token'))) {
      $entityManager->remove($season);
      $entityManager->flush();
    }

    return $this->redirectToRoute('app_season_index', [], Response::HTTP_SEE_OTHER);
  }
}