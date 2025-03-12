<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Entity;

use App\Acl\Domain\Entity\Plan;
use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Workspace
{
    use Timestampable;

    private string $id;

    private Plan $plan;

    private string $name;

    private int $membersCount = 0;

    private string $urlPath;

    private Collection $workers;

    private Collection $channels;

    public function __construct()
    {
        $this->id = UlidService::generate();

        $this->channels = new ArrayCollection();
        $this->workers = new ArrayCollection();
    }

    public function getUrlPath(): string
    {
        return $this->urlPath;
    }

    public function setUrlPath(string $urlPath): Workspace
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    public function setWorkers(User $worker): Workspace
    {
        $this->workers[] = $worker;

        return $this;
    }

    public function getChannels(): Collection
    {
        return $this->channels;
    }

    public function setChannels(Channel $channel): Workspace
    {
        $this->channels[] = $channel;

        return $this;
    }

    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    public function setMembersCount(int $membersCount): Workspace
    {
        $this->membersCount = $membersCount;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPlan(): Plan
    {
        return $this->plan;
    }

    public function setPlan(Plan $plan): Workspace
    {
        $this->plan = $plan;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Workspace
    {
        $this->name = $name;

        return $this;
    }
}
