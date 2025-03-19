<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Adapter;

interface AclAdapterInterface
{
    public function getRoles(): array;

    public function getPlans(): array;
}
