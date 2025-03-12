<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase;

use App\Shared\Application\Command\CommandBusInterface;
use App\Workspaces\Application\UseCase\Command\CreateWorkspace\CreateWorkspaceCommand;

readonly class AdminUseCaseInteractor
{
    public function __construct(private CommandBusInterface $commandBus)
    {
    }

    public function createWorkspace(CreateWorkspaceCommand $command): void
    {
        $this->commandBus->execute($command);
    }
}
