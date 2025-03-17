<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindPlans;

use App\Acl\Domain\Repository\PlanRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindAallPlanQueryHandler implements QueryHandlerInterface
{
    public function __construct(private readonly PlanRepositoryInterface $planRepository)
    {
    }

    /**
     * @param FindAllPlanQuery $planQuery
     * @return array
     */
    public function __invoke(FindAllPlanQuery $planQuery): array
    {
        return $this->planRepository->findAll();
    }
}
