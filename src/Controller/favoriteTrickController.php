<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class favoriteTrickController extends abstractController
{
    #[Route('/favoriteTrick')]
    public function favoriteTrick(SkaterRepository $skaterRepository): Response
    {
        $favoriteTrick = $skaterRepository->findNamesByFavoriteTrick('flip front');
        return $this->render('favoriteTrick.html.twig', ['favoriteTrick' => $favoriteTrick]);
    }

}
