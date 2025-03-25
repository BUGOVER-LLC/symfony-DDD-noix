<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindPlans;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Domain\Entity\Plan;
use App\Acl\Domain\Repository\PlanRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindAallPlanQueryHandler implements QueryHandlerInterface
{
    public function __construct(private PlanRepositoryInterface $planRepository)
    {
    }

    /**
     * @param FindAllPlanQuery $planQuery
     * @return array<PlanDTO>
     */
    public function __invoke(FindAllPlanQuery $planQuery): array
    {
        return array_map(
            callback: static fn(Plan $plan) => PlanDTO::toDto($plan),
            array: $this->planRepository->findAll(),
        );
    }
}
