<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Command\CreateWorkspace;

use App\Acl\Domain\Entity\Plan;
use App\Shared\Application\Command\CommandInterface;

readonly class CreateWorkspaceCommand implements CommandInterface
{
    public function __construct(public string $name, public string $urlPath, public Plan $plan)
    {
    }
}
