<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use DateTime;

class UserProfile
{
    use Timestampable;

    private string $id;

    private User $user;

    private Workspace $workspace;

    private string $fullName;

    private string $photo;

    private DateTime $timezone;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): UserProfile
    {
        $this->user = $user;

        return $this;
    }

    public function getWorkspace(): Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(Workspace $workspace): UserProfile
    {
        $this->workspace = $workspace;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): UserProfile
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): UserProfile
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTimezone(): DateTime
    {
        return $this->timezone;
    }

    public function setTimezone(DateTime $timezone): UserProfile
    {
        $this->timezone = $timezone;

        return $this;
    }
}
