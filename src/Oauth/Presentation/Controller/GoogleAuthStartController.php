<?php

declare(strict_types=1);

namespace App\Oauth\Presentation\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/oauth-google/start', name: 'google_auth_start')]
final class GoogleAuthStartController extends AbstractController
{
    public function __invoke(ClientRegistry $clientRegistry): RedirectResponse
    {
        return $clientRegistry->getClient('google')->redirect(['identify']);
    }
}
