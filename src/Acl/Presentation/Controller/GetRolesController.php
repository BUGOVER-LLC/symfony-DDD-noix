<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Controller;

use App\Acl\Domain\Service\GetDataService;
use App\Shared\Domain\Security\AuthUserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/roles', methods: ['GET', 'HEAD'])]
class GetRolesController extends AbstractController
{
    public function __construct(private readonly GetDataService $dataService, private readonly AuthUserInterface $user)
    {
    }

    public function __invoke(): JsonResponse
    {
        dd($this->user->getId());
        $this->dataService->getRoles();

        return $this->json([]);
    }
}
