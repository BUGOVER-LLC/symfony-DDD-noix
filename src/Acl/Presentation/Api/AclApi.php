<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Api;

use App\Workspaces\Domain\Adapter\AclAdapterInterface;

class AclApi implements AclAdapterInterface
{
    #[\Override] public function getRoles(): array
    {
        // TODO: Implement getRoles() method.
    }
}
