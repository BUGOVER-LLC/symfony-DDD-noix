<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Entity;

use App\Acl\Domain\Entity\Role;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class WorkspaceRole
{
    use Timestampable;

    private string $id;

    private Workspace $workspace;

    private Role $role;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }
}
