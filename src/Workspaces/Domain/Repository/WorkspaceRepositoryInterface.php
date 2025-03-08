<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Repository;

use App\User\Domain\Entity\User;
use App\Workspaces\Domain\Entity\Workspace;

interface WorkspaceRepositoryInterface
{
    public function add(Workspace $workspace): void;
}
