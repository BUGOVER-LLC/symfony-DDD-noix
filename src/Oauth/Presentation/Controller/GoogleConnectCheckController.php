<?php

declare(strict_types=1);

namespace App\Oauth\Presentation\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/oauth-google/connect/login', name: 'google_connect_login')]
final class GoogleConnectCheckController extends AbstractController
{
    public function __invoke(Request $request, ClientRegistry $clientRegistry)
    {
        dd(1111);
    }
}
