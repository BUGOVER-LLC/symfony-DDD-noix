<?php

declare(strict_types=1);

namespace App\User\Infrastructure\InviteUser;

use App\User\Domain\Service\InviteUserActionInterface;
use App\User\Infrastructure\DTO\InviteUserDTO;

class InviteUserAction implements InviteUserActionInterface
{
    public function __construct()
    {
    }

    #[\Override] public function invite(InviteUserDTO $payload)
    {

    }
}
