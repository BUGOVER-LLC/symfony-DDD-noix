<?php

declare(strict_types=1);

namespace App\Acl\Application\DTO;

use App\Acl\Application\Assembler\RoleAssembler;

final class RoleDTO extends RoleAssembler
{
    public function __construct(
        public string $id,
        public string $name,
        public string $key,
    )
    {
    }
}
