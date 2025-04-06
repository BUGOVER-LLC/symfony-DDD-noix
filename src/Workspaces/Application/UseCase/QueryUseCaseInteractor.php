<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase;

use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Workspaces\Application\UseCase\Command\IncrementWorker\IncrementWorkerCommand;
use App\Workspaces\Application\UseCase\Query\FindWorkspaceByUser\FindWorkspaceByUserQuery;
use App\Workspaces\Application\UseCase\Query\FindWorkspaceByUserEmail\FindWorkspaceByUserEmailQuery;

readonly class QueryUseCaseInteractor
{
    public function __construct(
        private CommandBusInterface $commandBus,
        private QueryBusInterface $queryBus,
    )
    {
    }

    public function incrementWorker(IncrementWorkerCommand $command): void
    {
        $this->commandBus->execute($command);
    }

    public function findWorkspacesByUser(FindWorkspaceByUserQuery $command)
    {
        return $this->queryBus->execute($command);
    }

    public function findWorkspacesByUserEmail(FindWorkspaceByUserEmailQuery $query)
    {
        return $this->queryBus->execute($query);
    }
}
