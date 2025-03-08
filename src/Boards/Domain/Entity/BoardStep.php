<?php

declare(strict_types=1);

namespace App\Boards\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class BoardStep
{
    use Timestampable;

    private string $id;

    private string $name;

    private Board $board;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function setBoard(Board $board): BoardStep
    {
        $this->board = $board;

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

    public function setName(string $name): BoardStep
    {
        $this->name = $name;

        return $this;
    }
}
