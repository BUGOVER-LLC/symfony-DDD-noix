<?php

declare(strict_types=1);

namespace App\Boards\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class SharedBoard
{
    use Timestampable;

    private string $id;

    private string $title;

    private int $membersCount = 0;

    private Board $board;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getMembersCount(): int
    {
        return $this->membersCount;
    }

    public function setMembersCount(int $membersCount): SharedBoard
    {
        $this->membersCount = $membersCount;

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

    public function setTitle(string $title): SharedBoard
    {
        $this->title = $title;

        return $this;
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function setBoard(Board $board): SharedBoard
    {
        $this->board = $board;

        return $this;
    }
}
