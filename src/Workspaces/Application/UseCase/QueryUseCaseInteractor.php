<?php

namespace App\Workspaces\Application\UseCase;

use App\Shared\Application\Command\CommandBusInterface;
use App\Workspaces\Application\UseCase\Command\IncrementWorker\IncrementWorkerCommand;

readonly class QueryUseCaseInteractor
{
    public function __construct(private CommandBusInterface $commandBus)
    {
    }

    public function incrementWorker(IncrementWorkerCommand $command): void
    {
        $this->commandBus->execute($command);
    }
}
