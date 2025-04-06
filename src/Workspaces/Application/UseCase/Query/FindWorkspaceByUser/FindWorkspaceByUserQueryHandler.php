<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Query\FindWorkspaceByUser;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\Workspaces\Application\UseCase\DTO\WorkspaceDTO;
use App\Workspaces\Domain\Entity\Workspace;
use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;

readonly class FindWorkspaceByUserQueryHandler implements QueryHandlerInterface
{
    public function __construct(private WorkspaceRepositoryInterface $workspaceRepository)
    {
    }

    public function __invoke(FindWorkspaceByUserQuery $byUserQuery): array
    {
        $workspaces = $this->workspaceRepository->findAllWorkspacesByUserId($byUserQuery->userId);

        if (empty($workspaces)) {
            return [];
        }

        return array_map(
            static fn(Workspace $workspace) => (new WorkspaceDTO(
                id: $workspace->getId(),
                name: $workspace->getName(),
                membersCount: $workspace->getMembersCount(),
                urlPath: $workspace->getUrlPath(),
                createdAt: $workspace->getCreatedAt()->format('Y-m-d H:i:s'),
            )),
            $workspaces
        );
    }
}
