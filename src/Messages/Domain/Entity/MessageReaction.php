<?php

declare(strict_types=1);

namespace App\Messages\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;

class MessageReaction
{
    use Timestampable;

    private string $id;

    private string $reaction;

    private Message $message;

    private User $reactor;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getReaction(): string
    {
        return $this->reaction;
    }

    public function setReaction(string $reaction): MessageReaction
    {
        $this->reaction = $reaction;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): MessageReaction
    {
        $this->message = $message;

        return $this;
    }

    public function getReactor(): User
    {
        return $this->reactor;
    }

    public function setReactor(User $reactor): MessageReaction
    {
        $this->reactor = $reactor;

        return $this;
    }
}
