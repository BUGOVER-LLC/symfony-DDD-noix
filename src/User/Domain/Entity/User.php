<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Security\AuthUserInterface;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Override;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class User implements AuthUserInterface
{
    use Timestampable;

    private string $id;

    private string $email;

    private ?string $phone;

    private ?string $password;

    private ?Workspace $currentWorkspace;

    private Collection $workspaces;

    private Collection $profiles;

    private Collection $refreshTokens;

    private ?Collection $channels;

    public function __construct()
    {
        $this->id = UlidService::generate();

        $this->workspaces = new ArrayCollection();
        $this->profiles = new ArrayCollection();
        $this->refreshTokens = new ArrayCollection();
        $this->channels = new ArrayCollection();
    }

    public function getChannels(): ?Collection
    {
        return $this->channels;
    }

    public function setChannels(?Channel $channel): User
    {
        if (!$this->channels->contains($channel)) {
            $this->channels->add($channel);
        }

        return $this;
    }

    public function getCurrentWorkspace(): ?Workspace
    {
        return $this->currentWorkspace;
    }

    public function setCurrentWorkspace(?Workspace $currentWorkspace): User
    {
        $this->currentWorkspace = $currentWorkspace;

        return $this;
    }

    public function getRefreshTokens(): Collection
    {
        return $this->refreshTokens;
    }

    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function setProfiles(UserProfile $profile): User
    {
        $this->profiles->add($profile);

        return $this;
    }

    public function getWorkspaces(): Collection
    {
        return $this->workspaces;
    }

    public function setWorkspaces(Workspace $workspace): User
    {
        $this->workspaces[] = $workspace;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password, UserPasswordHasherInterface $passwordHasher): void
    {
        $this->password = $passwordHasher->hashPassword($this, $password);
    }

    #[Override] public function getRoles(): array
    {
        return [
            'WORKSPACE_FULL_MEMBER',
        ];
    }

    #[Override] public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    #[Override] public function getUserIdentifier(): string
    {
        return $this->getEmail();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): User
    {
        $this->phone = $phone;

        return $this;
    }
}
