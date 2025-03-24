<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\CreateWorkspace;

use App\Acl\Domain\Entity\Plan;
use App\Shared\Application\Command\Command;

/**
 * @link CreateWorkspaceCommandHandler
 */
readonly class CreateWorkspaceCommand extends Command
{
    public function __construct(public string $name, public string $urlPath, public Plan $plan)
    {
    }
}
