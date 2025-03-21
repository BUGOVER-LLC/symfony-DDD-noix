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
     * @return array<Plan>
     */
    public function __invoke(FindAllPlanQuery $planQuery): array
    {
        return array_map(
            callback: static fn(Plan $plan) => new PlanDTO(
                id: $plan->getId(),
                name: $plan->getName(),
                description: $plan->getDescription(),
                price: $plan->getPrice(),
                trial: $plan->isTrial(),
                active: $plan->isActive(),
            ),
            array: $this->planRepository->findAll()
        );
    }
}
