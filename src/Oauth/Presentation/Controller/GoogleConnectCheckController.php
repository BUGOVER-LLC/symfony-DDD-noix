<?php

declare(strict_types=1);

namespace App\Oauth\Presentation\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/oauth-google/login', name: 'google_connect_login')]
final class GoogleConnectCheckController extends AbstractController
{
    public function __invoke(Request $request, ClientRegistry $clientRegistry, LoggerInterface $logger)
    {
        $logger->alert('OAUTH CUSTOM AUTH');

        if ($this->getUser()) {
            return $this->redirectToRoute('google_auth_start');
        }

        return $this->json(['status' => false, 'message' => 'User not found!']);
    }
}
