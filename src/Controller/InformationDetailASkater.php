<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InformationDetailASkater extends AbstractController
{
    #[Route('/information-about-a-skater/{firstName}-{lastName}', name: 'app_information')]
    public function __invoke(string $lastName, string $firstName, SkaterRepository $skaterRepository): Response
    {
        $skater = $skaterRepository->findOneBy(['lastName' => $lastName, 'firstName' => $firstName]);

        return $this->render('information_about_a_skater.html.twig', ['lastName' => $lastName, 'firstName' => $firstName, 'skater' => $skater]);
    }
}
