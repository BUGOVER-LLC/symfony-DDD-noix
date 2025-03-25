<?php

declare(strict_types=1);

namespace App\User\Domain\Service;

use App\User\Infrastructure\DTO\InviteUserDTO;

interface InviteUserActionInterface
{
    public function invite(InviteUserDTO $payload);
}
