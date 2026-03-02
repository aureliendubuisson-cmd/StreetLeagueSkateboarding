<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function __invoke(SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findall();

        return $this->render('homepage.html.twig', ['skaters' => $skaters]);
    }
}
