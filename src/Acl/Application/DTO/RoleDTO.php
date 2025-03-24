<?php

declare(strict_types=1);

namespace App\Acl\Application\DTO;

use App\Acl\Domain\Entity\Role;

readonly class RoleDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $key,
    )
    {
    }

    public static function fromEntity(Role $role): static
    {
        return new self($role->getId(), $role->getName(), $role->getKey());
    }
}
