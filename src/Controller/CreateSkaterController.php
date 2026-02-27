<?php

namespace App\Controller;

use App\Form\SkaterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateSkaterController extends AbstractController
{
    #[Route('/new-skater', name: 'app_new_skater')]
    public function __invoke(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkaterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newSkater = $form->getData();
            $entityManager->persist($newSkater);
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('new_skater.html.twig', ['form' => $form]);
    }
}
