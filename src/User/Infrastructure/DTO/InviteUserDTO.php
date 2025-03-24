<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class InviteUserDTO
{
    #[Assert\NotBlank()]
    #[Assert\GreaterThan(5)]
    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    private string $email;

    #[Assert\NotBlank()]
    #[Assert\GreaterThan(4)]
    #[Assert\Choice(choices: [
        'WORKSPACE_ADMIN',
        'WORKSPACE_FULL_MEMBER',
        'WORKSPACE_MEMBER',
        'CHANNEL_MANAGER',
        'INVITED_MEMBER',
        'CHANNEL_GUEST',
    ])]
    private string $role;

    #[Assert\NotBlank(allowNull: true)]
    private ?string $channel;

    public function getChannel(): ?string
    {
        return $this->channel;
    }

    public function setChannel(?string $channel): InviteUserDTO
    {
        $this->channel = $channel;

        return $this;
    }

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
