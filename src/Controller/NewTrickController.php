<?php

namespace App\Controller;

use App\Form\TrickType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewTrickController extends AbstractController
{
    #[Route('/new-trick', name: 'app_new_trick')]
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

        return $this->render('new_trick.html.twig', ['form' => $form]);
    }
}
