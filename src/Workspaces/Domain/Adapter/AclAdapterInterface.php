<?php

declare(strict_types=1);

namespace App\Workspaces\Domain\Adapter;

interface AclAdapterInterface
{
    public function getRoles(): array;
}
