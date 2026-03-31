<?php

namespace App\Controller;

use App\Form\TrickType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TrickTypeController extends AbstractController
{
    #[Route('/trick-type', name: 'app_trick_type')]
    public function invoke(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(TrickType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newTrick = $form->getData();
            $em->persist($newTrick);
            $em->flush();

            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('trick_type.html.twig', ['form' => $form]);
    }
}
