<?php

declare(strict_types=1);

namespace App\Channels\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\Collection;

class SharedChannel
{
    use Timestampable;

    private string $id;

    private Channel $channel;

    private string $name;

    private ?string $description;

    private Collection $workspaces;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getWorkspaces(): Collection
    {
        return $this->workspaces;
    }

    public function setWorkspace(Workspace $workspace): SharedChannel
    {
        $this->workspaces->add($workspace);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): SharedChannel
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SharedChannel
    {
        $this->name = $name;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): SharedChannel
    {
        $this->channel = $channel;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
