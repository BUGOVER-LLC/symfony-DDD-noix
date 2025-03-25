<?php

declare(strict_types=1);

namespace App\Acl\Domain\Security;

use App\User\Domain\Entity\User;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;

interface CanCheckHasInvitingUser
{
    public function canInvite(MapRequestPayload $userInvitation, User $user): bool;
}
