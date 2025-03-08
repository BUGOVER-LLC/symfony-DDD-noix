<?php

declare(strict_types=1);

namespace App\Channels\Domain\Entity;

use App\Boards\Domain\Entity\Board;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Common\Collections\Collection;

class Channel
{
    use Timestampable;

    private string $id;

    private string $name;

    private int $totalConnected = 0;

    private Workspace $workspace;

    private Collection $sharedChannels;

    private Collection $boards;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getBoards(): Collection
    {
        return $this->boards;
    }

    public function setBoard(Board $board): Channel
    {
        $this->boards->add($board);

        return $this;
    }

    public function getSharedChannels(): Collection
    {
        return $this->sharedChannels;
    }

    public function setSharedChannels(Collection $sharedChannel): Channel
    {
        $this->sharedChannels->add($sharedChannel);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Channel
    {
        $this->name = $name;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTotalConnected(): int
    {
        return $this->totalConnected;
    }

    public function setTotalConnected(int $totalConnected): Channel
    {
        $this->totalConnected = $totalConnected;

        return $this;
    }

    public function getWorkspace(): Workspace
    {
        return $this->workspace;
    }

    public function setWorkspace(Workspace $workspace): Channel
    {
        $this->workspace = $workspace;

        return $this;
    }
}
