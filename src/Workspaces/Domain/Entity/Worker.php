<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Security\Role;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;

class Worker
{
    use Timestampable;

    private string $id;

    private User $user;

    private Role $role;

    private Workspace $workspace;

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

    public function setUser(User $user): Worker
    {
        $this->user = $user;

        return $this;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): Worker
    {
        $this->role = $role;

        return $this;
    }

    public function getWorkspace(): Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(Workspace $workspace): Worker
    {
        $this->workspace = $workspace;

        return $this;
    }
}
