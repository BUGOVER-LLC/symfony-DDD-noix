<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Command\SetCurrentWorkspace;

use App\Shared\Application\Command\Command;

readonly class SetCurrentWorkspaceCommand extends Command
{
    public function __construct(public string $userId, public string $workspaceId)
    {
    }
}
