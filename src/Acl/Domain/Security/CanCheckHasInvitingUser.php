<?php

declare(strict_types=1);

namespace App\Acl\Domain\Security;

use App\User\Domain\Entity\User;
use App\User\Infrastructure\DTO\InviteUserDTO;

interface CanCheckHasInvitingUser
{
    public function canInvite(InviteUserDTO $userInvitation, User $user): bool;
}
