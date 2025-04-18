<?php

declare(strict_types=1);

namespace App\Workspaces\Presentation\Controller;

use App\Shared\Application\Attribute\RequestBody;
use App\Shared\Application\Model\ErrorResponse;
use App\Workspaces\Infrastructure\RequestDTO\GetWorkspaceDTO;
use Nelmio\ApiDocBundle\Attribute\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use OpenApi\Attributes as OA;

#[IsGranted(attribute: 'IS_AUTHENTICATED_FULLY', statusCode: 401)]
#[Route(path: '/api/v1/workspaces', methods: ['GET'])]
#[OA\RequestBody]
//#[OA\Response(response: 409, description: 'Book category already exists', attachables: [
//    new Model(
//        type: ErrorResponse::class,
//    ),
//])]
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
