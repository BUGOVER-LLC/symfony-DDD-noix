<?php

declare(strict_types=1);

namespace App\Acl\Domain\Repository;

use App\Acl\Domain\Entity\Role;

interface RoleRepositoryInterface
{
    public function add(Role $role);

    /**
     * @param string $workspace
     * @return array<Role>
     */
    public function findAllRoleByWorkspace(string $workspace): array;

    /**
     * @param string $name
     * @return Role|null
     */
    public function findByName(string $name): ?Role;

    public function findByKey(string $key): ?Role;
}
