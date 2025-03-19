<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\IncrementWorker;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Workspaces\Domain\Repository\WorkerRepositoryInterface;

readonly class IncrementWorkerCommandHandler implements CommandHandlerInterface
{
    public function __construct(private readonly WorkerRepositoryInterface $workerRepository)
    {
    }

    public function __invoke(IncrementWorkerCommand $command)
    {
        if ($command->increment) {
//            $this->workerRepository
        }

//            $this->workerRepository
    }
}
