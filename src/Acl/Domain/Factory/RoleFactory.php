<?php

declare(strict_types=1);

namespace App\Acl\Domain\Factory;

use App\Acl\Domain\Entity\Role;

class RoleFactory
{
    public function create(string $key, string $name): Role
    {
        $role = new Role();
        $role->setName($name);
        $role->setKey($key);

        return $role;
    }
}
