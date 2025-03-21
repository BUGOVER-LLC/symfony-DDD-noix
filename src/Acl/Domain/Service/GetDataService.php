<?php

declare(strict_types=1);

namespace App\Acl\Domain\Service;

use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindRoles\FindAllRoleByWorkspaceQuery;

final class GetDataService
{
    public function __construct(private readonly QueryInteractor $queryInteractor)
    {
    }

    public function getRoles(string $user): RoleDTO
    {
        $workspace =
        $this->queryInteractor->findAllRolesQuery(new FindAllRoleByWorkspaceQuery($workspace));
    }
}
