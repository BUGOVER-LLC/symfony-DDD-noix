<?php

declare(strict_types=1);

namespace App\Oauth\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/', name: 'oauth_google_home')]
final class GoogleSuccessRedirectController extends AbstractController
{
    public function __invoke(): JsonResponse
    {
        return $this->json(['Auth success']);
    }
}
