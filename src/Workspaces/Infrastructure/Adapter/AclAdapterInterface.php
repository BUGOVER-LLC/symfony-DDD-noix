<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Adapter;

use App\Acl\Application\DTO\RoleDTO;

interface AclAdapterInterface
{
    public function getRoles(): array;

    public function getPlans(): array;

    public function getRoleByName(string $name): RoleDTO;

    public function getRoleByKey(string $key): RoleDTO;
}
