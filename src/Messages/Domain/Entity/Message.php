<?php

declare(strict_types=1);

namespace App\Messages\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;

class Message
{
    use Timestampable;

    private string $id;

    private array $body;

    private Channel $channel;

    private User $author;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): Message
    {
        $this->body = $body;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): Message
    {
        $this->author = $author;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): Message
    {
        $this->channel = $channel;

        return $this;
    }
}
