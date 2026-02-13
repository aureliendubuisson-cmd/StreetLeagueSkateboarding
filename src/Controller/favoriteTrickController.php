<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class favoriteTrickController extends AbstractController
{
    #[Route('/{tricks}', name: 'favoriteTricks')]
    #[Route('/', name : 'homepage')]
    public function favoriteTrick(string $tricks, SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findNamesByFavoriteTrick(favoriteTrick: $tricks);

        return $this->render('favoriteTrick.html.twig', ['skaters' => $skaters, 'tricks' => $tricks]);
    }
}
