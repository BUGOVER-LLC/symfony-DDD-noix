<?php

declare(strict_types=1);

namespace App\Oauth\Presentation\Controller;

use App\Oauth\Domain\Security\GoogleAuthenticator;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/oauth-google/login', name: 'google_auth_login')]
final class GoogleConnectCheckController extends AbstractController
{
    public function __invoke(
        Request $request,
        ClientRegistry $clientRegistry,
        LoggerInterface $logger,
        GoogleAuthenticator $googleAuthenticator,
    )
    {
        $logger->alert('OAUTH CUSTOM AUTH');

        if ($this->getUser()) {
            return $this->redirectToRoute('google_auth_start');
        }

        return $this->json(
            ['status' => false, 'message' => 'User not found!'],
            Response::HTTP_NOT_FOUND,
        );
    }
}
