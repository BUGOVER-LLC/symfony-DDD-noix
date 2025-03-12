<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoles;

use App\Shared\Application\Query\QueryInterface;

readonly class FindAllRoleByWorkspaceQuery implements QueryInterface
{
    public function __construct(public string $workspace)
    {
    }
}
