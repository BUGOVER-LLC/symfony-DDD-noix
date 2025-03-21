<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/roles', methods: ['GET', 'HEAD'])]
class GetRolesController extends AbstractController
{
    public function __invoke(): JsonResponse
    {
        return $this->json([]);
    }
}
