<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Adapter;

interface WorkspaceAdapter
{
    /**
     * @param string $userId
     */
    public function getWorkspacesByUserId(string $userId): array;
}
