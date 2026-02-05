<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(SkaterRepository $skaters): Response
    {
        $skaters->findall();

        return $this->render('homepage.html.twig', ['skaters' => $skaters]);
    }
}
