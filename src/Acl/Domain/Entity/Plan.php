<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Plan
{
    use Timestampable;

    private string $id;

    private string $name;

    private float $price;

    private ?string $description;

    private bool $trial = false;

    private bool $active = true;

    private Collection $workspaces;

    private Collection $planFeatures;

    public function __construct()
    {
        $this->id = UlidService::generate();

        $this->workspaces = new ArrayCollection();
        $this->planFeatures = new ArrayCollection();
    }

    public function getPlanFeatures(): Collection
    {
        return $this->planFeatures;
    }

    public function setPlanFeatures(PlanFeature $planFeature): Plan
    {
        $this->planFeatures->add($planFeature);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Plan
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Plan
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Plan
    {
        $this->price = $price;

        return $this;
    }

    public function isTrial(): bool
    {
        return $this->trial;
    }

    public function setTrial(bool $trial): Plan
    {
        $this->trial = $trial;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): Plan
    {
        $this->active = $active;

        return $this;
    }

    public function getWorkspaces(): Collection
    {
        return $this->workspaces;
    }

    public function setWorkspaces(Workspace $workspaces): Plan
    {
        $this->workspaces->add($workspaces);

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
