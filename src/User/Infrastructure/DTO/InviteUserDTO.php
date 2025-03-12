<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;

class InviteUserDTO
{
    #[NotBlank]
    #[GreaterThan(5)]
    private string $email;

    #[NotBlank]
    #[GreaterThan(4)]
    private string $role;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): InviteUserDTO
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): InviteUserDTO
    {
        $this->role = $role;

        return $this;
    }
}
