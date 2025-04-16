<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Adapter;

use App\Workspaces\Application\UseCase\DTO\WorkspaceDTO;

interface WorkspaceAdapter
{
    /**
     * @param string $userId
     * @return WorkspaceDTO[]
     */
    public function getWorkspacesByUserId(string $userId): array;

    /**
     * @param string $email
     * @return WorkspaceDTO[]
     */
    public function getWorkspacesByEmail(string $email): array;
}
