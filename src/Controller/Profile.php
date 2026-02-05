<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Profile
{
    #[Route('/profiles')]
    public function skateurs(): Response
    {
        return new Response('Profiles: propriété class skateurs');
    }
}
