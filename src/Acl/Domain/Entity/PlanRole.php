<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class PlanRole
{
    use Timestampable;

    private string $id;

    private Plan $plan;

    private Role $role;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPlan(): Plan
    {
        return $this->plan;
    }

    public function setPlan(Plan $plan): PlanRole
    {
        $this->plan = $plan;

        return $this;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): PlanRole
    {
        $this->role = $role;

        return $this;
    }
}
