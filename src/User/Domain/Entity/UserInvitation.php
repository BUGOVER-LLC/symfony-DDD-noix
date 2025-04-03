<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Acl\Domain\Entity\Role;
use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use DateTimeImmutable;
use Random\RandomException;
use Symfony\Component\String\ByteString;

class UserInvitation
{
    use Timestampable;

    private string $id;

    private string $email;

    private string $token;

    private Role $role;

    private Workspace $workspace;

    private ?Channel $channel;

    private ?DateTimeImmutable $acceptedAt = null;

    /**
     * @throws RandomException
     */
    public function __construct()
    {
        $this->id = UlidService::generate();
        $this->token = ByteString::fromRandom(191)->toString();
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function setChannel(?Channel $channel): UserInvitation
    {
        $this->channel = $channel;

        return $this;
    }

    public function getWorkspace(): Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(Workspace $workspace): UserInvitation
    {
        $this->workspace = $workspace;

        return $this;
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
