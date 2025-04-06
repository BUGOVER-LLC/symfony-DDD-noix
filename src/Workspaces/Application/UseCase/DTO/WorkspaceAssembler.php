<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\DTO;

use App\Workspaces\Domain\Entity\Workspace;

class WorkspaceAssembler
{
    public function fromEntity(Workspace $workspace)
    {
        return new WorkspaceDTO(
            id: $workspace->getId(),
            name: $workspace->getName(),
            membersCount: $workspace->getMembersCount(),
            urlPath: $workspace->getUrlPath(),
            createdAt: $workspace->getCreatedAt()->format('Y-m-d H:i:s'),
        );
    }

    public function toEntity(WorkspaceDTO $workspaceDTO): Workspace
    {
        return (new Workspace())
            ->setName($workspaceDTO->name)
            ->setUrlPath($workspaceDTO->urlPath)
            ->setMembersCount($workspaceDTO->membersCount);
    }
}
