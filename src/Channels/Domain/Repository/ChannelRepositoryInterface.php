<?php

declare(strict_types=1);

namespace App\Channels\Domain\Repository;

interface ChannelRepositoryInterface
{
    public function findAllChannelsByUserId(string $userId): array;

    public function getTotalConnectedCount(string $channelId): int;

    public function getMembersCount(string $channelId): int;
}
