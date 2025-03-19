<?php

declare(strict_types=1);

namespace App\Acl\Presentation\Api;

use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
use App\Workspaces\Infrastructure\Adapter\AclAdapterInterface;

class AclApi implements AclAdapterInterface
{
    public function __construct(private readonly QueryInteractor $queryInteractor)
    {
    }

    #[\Override] public function getRoles(): array
    {
        // TODO: Implement getRoles() method.
    }

    #[\Override] public function getPlans(): array
    {
        return $this->queryInteractor->findAllPlanQuery(new FindAllPlanQuery());
    }
}
