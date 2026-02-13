<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FavoriteTrickController extends AbstractController
{
    #[Route('/favorite-tricks/{tricks}', name: 'app_favorite_tricks')]
    public function favoriteTrick(string $tricks, SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findNamesByFavoriteTrick(favoriteTrick: $tricks);

        return $this->render('favorite_trick.html.twig', ['skaters' => $skaters, 'tricks' => $tricks]);
    }
}
