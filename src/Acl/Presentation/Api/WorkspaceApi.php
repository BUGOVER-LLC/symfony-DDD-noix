<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Api;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
use App\Acl\Application\UseCase\Query\FindRoles\FindAllRoleByWorkspaceQuery;
use App\Workspaces\Infrastructure\Adapter\AclAdapterInterface;

class WorkspaceApi implements AclAdapterInterface
{
    public function __construct(private readonly QueryInteractor $queryInteractor)
    {
    }

    /**
     * @return RoleDTO[]
     */
    #[\Override] public function getRoles(): array
    {
        return $this->queryInteractor->findAllRolesQuery(new FindAllRoleByWorkspaceQuery());
    }

    /**
     * @return PlanDTO[]
     */
    #[\Override] public function getPlans(): array
    {
        return $this->queryInteractor->findAllPlanQuery(new FindAllPlanQuery());
    }
}
