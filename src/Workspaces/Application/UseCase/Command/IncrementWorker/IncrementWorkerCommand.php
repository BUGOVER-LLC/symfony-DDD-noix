<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\IncrementWorker;

use App\Shared\Application\Command\CommandInterface;

readonly class IncrementWorkerCommand implements CommandInterface
{
    public function __construct(public bool $increment = true)
    {
    }
}
