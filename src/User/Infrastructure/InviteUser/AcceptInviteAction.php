<?php

declare(strict_types=1);

namespace App\User\Infrastructure\InviteUser;

use App\User\Infrastructure\DTO\InviteUserAcceptDTO;

final class AcceptInviteAction implements AcceptInviteActionInterface
{
    public function __construct()
    {
    }

    public function accept(InviteUserAcceptDTO $inviteUserAcceptDTO): void
    {
    }
}
