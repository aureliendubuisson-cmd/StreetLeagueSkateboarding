<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class YoungSkatersController extends AbstractController
{
    #[Route('/age/{age}', name: 'app_skaters_age')]
    public function homepage(int $age, SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findSkatersYoungerThanAge($age);

        return $this->render('young_skaters.html.twig', ['skaters' => $skaters, 'age' => $age]);
    }
}
