<?php

declare(strict_types=1);

namespace App\Boards\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\Collection;

class Board
{
    use Timestampable;

    private string $id;

    private string $title;

    private int $membersCount = 0;

    private ?Workspace $workspace;

    private Collection $sharedBoards;

    private Collection $channels;

    private Collection $steps;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function setSteps(BoardStep $step): Board
    {
        $this->steps->add($step);

        return $this;
    }

    public function getChannels(): Collection
    {
        return $this->channels;
    }

    public function setChannels(Channel $channel): Board
    {
        $this->channels->add($channel);

        return $this;
    }

    public function getSharedBoards(): Collection
    {
        return $this->sharedBoards;
    }

    public function setSharedBoards(Board $sharedBoard): Board
    {
        $this->sharedBoards->add($sharedBoard);

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Board
    {
        $this->title = $title;

        return $this;
    }

    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    public function setMembersCount(int $membersCount): Board
    {
        $this->membersCount = $membersCount;

        return $this;
    }

    public function getWorkspace(): ?Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(?Workspace $workspace): Board
    {
        $this->workspace = $workspace;

        return $this;
    }
}
