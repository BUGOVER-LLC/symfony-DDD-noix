<?php

declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\UserInvitation;

interface UserInvitationRepositoryInterface
{
    /**
     * @param string $email
     * @param string $workspaceId
     * @param string|null $channelId
     * @return UserInvitation|null
     */
    public function findInvitationByUserId(
        string $email,
        string $workspaceId,
        ?string $channelId = null
    ): ?UserInvitation;

    public function add(UserInvitation $userInvitation): void;
}
