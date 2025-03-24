<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoles;

use App\Shared\Application\Query\Query;

readonly class FindAllRoleByWorkspaceQuery extends Query
{
    public function __construct(public string $workspace)
    {
    }
}
