<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Repository;

use App\Workspaces\Domain\Entity\Worker;

interface WorkerRepositoryInterface
{
    public function add(Worker $worker): string;
}
