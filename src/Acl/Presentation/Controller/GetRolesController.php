<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Controller;

use App\Acl\Application\Service\GetDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/roles', methods: ['GET', 'HEAD'])]
class GetRolesController extends AbstractController
{
    public function __construct(private readonly GetDataService $dataService)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $roles = $this->dataService->getRoles();

        return $this->json($roles);
    }
}
