<?php

namespace App\Controller;

use App\Form\ChooseCountryType;
use App\Repository\SkaterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CountryController extends AbstractController
{
    #[Route('/country', name: 'app_country', methods: ['GET', 'POST'])]
    public function skaterByCountry(Request $request, SkaterRepository $skaterRepository): Response
    {
        $form = $this->createForm(type: ChooseCountryType::class);
        $form->handleRequest($request);
        $skaters = [];

        if ($form->isSubmitted() && $form->isValid()) {
            $country = $form->getData()['country'];
            $skaters = $skaterRepository->findSkatersByCountry($country);

            return $this->render('sort_skaters.html.twig', [
                'form' => $form,
                'skaters' => $skaters,
            ]);
        }

        return $this->render('sort_skaters.html.twig', [
            'form' => $form,
            'skaters' => $skaters,
        ]);
    }
}
