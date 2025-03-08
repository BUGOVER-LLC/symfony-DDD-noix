<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class PlanFeature
{
    use Timestampable;

    private string $id;

    private string $name;

    private ?string $description;

    private Plan $plan;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getPlan(): Plan
    {
        return $this->plan;
    }

    public function setPlan(Plan $plan): PlanFeature
    {
        $this->plan = $plan;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PlanFeature
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): PlanFeature
    {
        $this->description = $description;

        return $this;
    }
}
