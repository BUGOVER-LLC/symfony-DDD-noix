<?php

declare(strict_types=1);

namespace App\User\Infrastructure\InviteUser;

use App\User\Infrastructure\DTO\InviteUserAcceptDTO;
use App\User\Infrastructure\DTO\InviteUserDTO;

interface AcceptInviteActionInterface
{
    public function accept(InviteUserAcceptDTO $inviteUserAcceptDTO): void;
}
