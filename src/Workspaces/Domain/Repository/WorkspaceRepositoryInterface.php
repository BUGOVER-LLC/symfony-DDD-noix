<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Repository;

use App\Workspaces\Domain\Entity\Workspace;

interface WorkspaceRepositoryInterface
{
    public function add(Workspace $workspace): void;

    public function delete(Workspace $workspace): void;

    public function findAllWorkspacesByUserId(int $userId): ?Workspace;

    public function incrementWorkerCount(Workspace $workspace): void;
}
