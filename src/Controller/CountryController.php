<?php

namespace App\Controller;

use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CountryController extends AbstractController
{
    #[Route('/country/{country}', name: 'app_country')]
    public function skaterByCountry(string $country, SkaterRepository $skaterRepository): Response
    {
        $skaters = $skaterRepository->findSkatersByCountry(country: $country);

        return $this->render('country.html.twig', ['skaters' => $skaters, 'country' => $country]);
    }
}
