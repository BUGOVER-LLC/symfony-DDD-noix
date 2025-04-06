<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Repository;

use App\Workspaces\Domain\Entity\Workspace;

interface WorkspaceRepositoryInterface
{
    /**
     * @param Workspace $workspace
     * @return void
     */
    public function add(Workspace $workspace): void;

    /**
     * @param Workspace $workspace
     * @return void
     */
    public function delete(Workspace $workspace): void;

    /**
     * @param string $userId
     * @return Workspace[]
     */
    public function findAllWorkspacesByUserId(string $userId): array;

    /**
     * @param Workspace $workspace
     * @return void
     */
    public function incrementWorkerCount(Workspace $workspace): void;

    /**
     * @param Workspace $workspace
     * @return void
     */
    public function decrementWorkerCount(Workspace $workspace): void;

    /**
     * @param string $email
     * @return Workspace[]
     */
    public function findAllWorkspacesByUserEmail(string $email): array;
}
