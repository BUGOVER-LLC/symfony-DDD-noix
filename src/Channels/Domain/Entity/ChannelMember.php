<?php

declare(strict_types=1);

namespace App\Channels\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;

class ChannelMember
{
    use Timestampable;

    private string $id;

    private User $member;

    private Channel $channel;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ChannelMember
    {
        $this->id = $id;

        return $this;
    }

    public function getMember(): User
    {
        return $this->member;
    }

    public function setMember(User $member): ChannelMember
    {
        $this->member = $member;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): ChannelMember
    {
        $this->channel = $channel;

        return $this;
    }
}
