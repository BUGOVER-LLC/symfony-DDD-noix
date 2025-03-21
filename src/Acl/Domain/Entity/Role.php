<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Role
{
    use Timestampable;

    private string $id;

    private string $key;

    private string $name;

    private Collection $workspaces;

    public function __construct()
    {
        $this->id = UlidService::generate();
        $this->workspaces = new ArrayCollection();
    }

    public function getWorkspaces(): Collection
    {
        return $this->workspaces;
    }

    public function setWorkspaces(Workspace $workspace): Role
    {
        $this->workspaces->add($workspace);

        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Role
    {
        $this->key = $key;

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

    public function setName(string $name): Role
    {
        $this->name = $name;

        return $this;
    }
}
