<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Acl\Domain\Entity\Role;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use DateTimeImmutable;
use Random\RandomException;

class UserInvitation
{
    use Timestampable;

    private string $id;

    private string $email;

    private string $token;

    private Role $role;

    private ?DateTimeImmutable $acceptedAt = null;

    /**
     * @throws RandomException
     */
    public function __construct()
    {
        $this->id = UlidService::generate();
        $this->token = random_bytes(191);
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): UserInvitation
    {
        $this->role = $role;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): UserInvitation
    {
        $this->email = $email;

        return $this;
    }

    public function getAcceptedAt(): ?DateTimeImmutable
    {
        return $this->acceptedAt;
    }

    public function setAcceptedAt(): static
    {
        $this->acceptedAt = new DateTimeImmutable('now');

        return $this;
    }
}
