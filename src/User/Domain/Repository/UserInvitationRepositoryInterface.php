<?php

declare(strict_types=1);

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\UserInvitation;

interface UserInvitationRepositoryInterface
{
    /**
     * @param string $email
     * @return UserInvitation|null
     */
    public function findInvitationByUserId(
        string $email,
        string $workspaceId,
        ?string $channelId = null
    ): ?UserInvitation;
}
