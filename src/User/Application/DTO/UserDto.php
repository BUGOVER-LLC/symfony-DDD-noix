<?php

declare(strict_types=1);

namespace App\User\Application\DTO;

use App\User\Domain\Entity\User;

readonly class UserDto
{
    public function __construct(
        public string $id,
        public string $email,
        public array $roles,
    )
    {
    }

    public static function fromEntity(User $user): UserDto
    {
        return new self($user->getId(), $user->getEmail(), $user->getRoles());
    }
}
