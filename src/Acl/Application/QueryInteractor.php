<?php

declare(strict_types=1);

namespace App\Acl\Application;

use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
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
}
