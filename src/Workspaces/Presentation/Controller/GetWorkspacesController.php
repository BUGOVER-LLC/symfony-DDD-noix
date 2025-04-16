<?php

declare(strict_types=1);

namespace App\Workspaces\Presentation\Controller;

use App\Shared\Application\Attribute\RequestBody;
use App\Workspaces\Infrastructure\RequestDTO\GetWorkspaceDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted(attribute: 'IS_AUTHENTICATED_FULLY', statusCode: 401)]
#[Route(path: '/api/v1/workspaces', methods: ['GET'])]
class GetWorkspacesController extends AbstractController
{
    public function __construct(private readonly Security $security)
    {
    }

    public function __invoke(#[RequestBody] GetWorkspaceDTO $workspaceDTO): JsonResponse
    {


        return $this->json([]);
    }
}
