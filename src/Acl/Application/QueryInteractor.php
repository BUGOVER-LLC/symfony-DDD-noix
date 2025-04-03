<?php

declare(strict_types=1);

namespace App\Acl\Application;

use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
use App\Acl\Application\UseCase\Query\FindRoleByKey\FindRoleByKeyQuery;
use App\Acl\Application\UseCase\Query\FindRoleByName\FindRoleByNameQuery;
use App\Acl\Application\UseCase\Query\FindRoles\FindAllRoleByWorkspaceQuery;
use App\Shared\Application\Query\QueryBusInterface;

readonly class QueryInteractor
{
    public function __construct(private QueryBusInterface $bus)
    {
    }

    public function findAllPlanQuery(FindAllPlanQuery $findAllPlanQuery)
    {
        return $this->bus->execute($findAllPlanQuery);
    }

    public function findAllRolesQuery(FindAllRoleByWorkspaceQuery $findAllRoleByWorkspaceQuery)
    {
        return $this->bus->execute($findAllRoleByWorkspaceQuery);
    }

    public function findRoleByName(FindRoleByNameQuery $byNameQuery)
    {
        return $this->bus->execute($byNameQuery);
    }

    public function findRoleByKey(FindRoleByKeyQuery $byKeyQuery)
    {
        return $this->bus->execute($byKeyQuery);
    }
}
