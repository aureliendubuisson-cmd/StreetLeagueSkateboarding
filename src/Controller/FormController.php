<?php

namespace App\Controller;

use App\Form\SkaterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('/new_skater', name: 'app_new_skater')]
    public function FormController(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkaterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $NewSkater = $form->getData();
            $entityManager->persist($NewSkater);
            $entityManager->flush();

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('new_skater.html.twig', ['form' => $form]);
    }
}
