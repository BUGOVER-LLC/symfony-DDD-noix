<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\CreateWorkspace;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Workspaces\Domain\Factory\WorkspaceFactory;
use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;

readonly class CreateWorkspaceCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private WorkspaceRepositoryInterface $workspaceRepository,
        private WorkspaceFactory $workspaceFactory,
    )
    {
    }

    public function __invoke(CreateWorkspaceCommand $workspaceCommand): string
    {
        $workspace = $this->workspaceFactory->create(
            name: $workspaceCommand->name,
            urlPath: $workspaceCommand->urlPath,
            plan: $workspaceCommand->plan,
        );
        $this->workspaceRepository->add($workspace);

        return $workspace->getId();
    }
}
