<?php

declare(strict_types=1);

namespace App\User\Application\DTO;

use DateTimeImmutable;

readonly class UserInvitationDTO
{
    public function __construct(
        public string $id,
        public string $email,
        public string $token,
        public ?DateTimeImmutable $acceptedAt,
        public DateTimeImmutable $createdAt,
    )
    {
    }
}
