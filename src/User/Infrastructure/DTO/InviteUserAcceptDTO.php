<?php

declare(strict_types=1);

namespace App\User\Infrastructure\DTO;

use Symfony\Component\Validator\Constraints as Assert;

readonly class InviteUserAcceptDTO
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
    private string $password;
    #[Assert\NotBlank]
    private ?string $token;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): InviteUserAcceptDTO
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): InviteUserAcceptDTO
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): InviteUserAcceptDTO
    {
        $this->token = $token;

        return $this;
    }
}
