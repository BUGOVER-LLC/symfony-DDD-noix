<?php

declare(strict_types=1);

namespace App\Channels\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\Workspaces\Domain\Entity\Workspace;

class SharedChannelWorkspace
{
    use Timestampable;

    private string $id;

    private SharedChannel $sharedChannel;

    private Workspace $targetWorkspace;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSharedChannel(): SharedChannel
    {
        return $this->sharedChannel;
    }

    public function setSharedChannel(SharedChannel $sharedChannel): SharedChannelWorkspace
    {
        $this->sharedChannel = $sharedChannel;

        return $this;
    }

    public function getTargetWorkspace(): Workspace
    {
        return $this->targetWorkspace;
    }

    public function setTargetWorkspace(Workspace $targetWorkspace): SharedChannelWorkspace
    {
        $this->targetWorkspace = $targetWorkspace;

        return $this;
    }
}
