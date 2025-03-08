<?php

declare(strict_types=1);

namespace App\Channels\Domain\Repository;

interface ChannelRepositoryInterface
{
    public function findAllChannelsByUserId(int $userId): array;

    public function findAllChannelsByUserIdWorkspaceId(int $userId, int $workspaceId): array;
}
