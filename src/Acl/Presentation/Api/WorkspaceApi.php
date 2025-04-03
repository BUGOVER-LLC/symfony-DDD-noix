<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Api;

use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
use App\Acl\Application\UseCase\Query\FindRoleByKey\FindRoleByKeyQuery;
use App\Acl\Application\UseCase\Query\FindRoleByName\FindRoleByNameQuery;
use App\Acl\Application\UseCase\Query\FindRoles\FindAllRoleByWorkspaceQuery;
use App\Workspaces\Infrastructure\Adapter\AclAdapterInterface;

final class WorkspaceApi implements AclAdapterInterface
{
    public function __construct(private readonly QueryInteractor $queryInteractor)
    {
    }

    #[\Override] public function getRoles(): array
    {
        return $this->queryInteractor->findAllRolesQuery(new FindAllRoleByWorkspaceQuery());
    }

    #[\Override] public function getPlans(): array
    {
        return $this->queryInteractor->findAllPlanQuery(new FindAllPlanQuery());
    }

    #[\Override] public function getRoleByName(string $name): RoleDTO
    {
        return $this->queryInteractor->findRoleByName(new FindRoleByNameQuery($name));
    }

    #[\Override] public function getRoleByKey(string $key): RoleDTO
    {
        return $this->queryInteractor->findRoleByKey(new FindRoleByKeyQuery($key));
    }
}
