<?php

namespace App\Controller;

use App\Entity\Skater;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SkaterDetailController extends AbstractController
{
    #[Route('/skater-detail/{id}', name: 'app_skater_detail')]
    public function __invoke(Skater $skater): Response
    {
        return $this->render('information_about_a_skater.html.twig', ['skater' => $skater]);
    }
}
