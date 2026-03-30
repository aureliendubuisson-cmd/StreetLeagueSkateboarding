<?php

namespace App\Controller;

use App\Form\ChooseFavoriteTrickType;
use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FavoriteTrickController extends AbstractController
{
    #[Route('/favorite-tricks', name: 'app_favorite_tricks', methods: ['GET', 'POST'])]
    public function skaterByFavoriteTrick(Request $request, SkaterRepository $skaterRepository): Response
    {
        $form = $this->createForm(ChooseFavoriteTrickType::class);
        $form->handleRequest($request);
        $skaters = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $favoriteTrick = $form->getData()['favorite_trick'];
            $skaters = $skaterRepository->findNamesByFavoriteTrick($favoriteTrick);

            return $this->render('sort_skaters.html.twig', [
                'form' => $form,
                'skaters' => $skaters,
            ]);
        }

        return $this->render('sort_skaters.html.twig', [
            'form' => $form,
            'skaters' => $skaters,
        ]);
    }
}
