<?php

declare(strict_types=1);

namespace App\Acl\Domain\Repository;

use App\Acl\Domain\Entity\Role;

interface RoleRepositoryInterface
{
    public function add(Role $role);

    public function findAllRoleByWorkspace(string $workspace): Role;
}
