<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\IncrementWorker;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;

readonly class IncrementWorkerCommandHandler implements CommandHandlerInterface
{
    public function __construct(private WorkspaceRepositoryInterface $workspaceRepository)
    {
    }

    public function __invoke(IncrementWorkerCommand $command)
    {
//        if ($command->increment) {
//            $this->workspaceRepository->incrementWorkerCount($command);
//        }

//            $this->workspaceRepository->decrementWorkerCount($workspace);
    }
}
