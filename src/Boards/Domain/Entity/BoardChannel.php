<?php

declare(strict_types=1);

namespace App\Boards\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class BoardChannel
{
    use Timestampable;

    private string $id;

    private Channel $channel;

    private Board $board;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): BoardChannel
    {
        $this->channel = $channel;

        return $this;
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function setBoard(Board $board): BoardChannel
    {
        $this->board = $board;

        return $this;
    }
}
