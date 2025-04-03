<?php

declare(strict_types=1);

namespace App\Acl\Application\Assembler;

use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Domain\Entity\Role;

class RoleAssembler
{
    private static array $entity = [];

    public function fromEntity(Role $role): RoleDTO
    {
        self::$entity[$role->getId()] = $role;

        return new RoleDTO(
            id: $role->getId(),
            name: $role->getName(),
            key: $role->getKey()
        );
    }

    public function toEntity(string $id = null): array|Role
    {
        if ($id && self::$entity[$id]) {
            return self::$entity[$id];
        }

        return self::$entity[0];
    }
}
