<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InformationAboutASkaterController extends AbstractController
{
    #[Route('/information-about-a-skater/{fullName}', name: 'app_information')]
    public function __invoke(string $fullName, SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findByName(fullName: $fullName);

        $skater = $skaterRepository->findOneBy($skaters);

        return $this->render('information_about_a_skater.html.twig', ['skaters' => $skaters, 'fullName' => $fullName, 'skater' => $skater]);
    }
}
