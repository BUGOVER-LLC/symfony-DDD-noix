<?php

declare(strict_types=1);

namespace App\Acl\Application\Assembler;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Domain\Entity\Plan;

class PlanAssembler
{
    private static array $entity = [];

    public function fromEntity(Plan $plan): PlanDTO
    {
        self::$entity[$plan->getId()] = $plan;

        return new PlanDTO(
            id: $plan->getId(),
            name: $plan->getName(),
            description: $plan->getDescription(),
            price: $plan->getPrice(),
            trial: $plan->isTrial(),
            active: $plan->isActive(),
            createdAt: $plan->getCreatedAt(),
        );
    }

    /**
     * @param string|null $id
     * @return Plan[]|Plan
     */
    public function toEntity(string $id = null): array|Plan
    {
        if ($id && self::$entity[$id]) {
            return self::$entity[$id];
        }

        return self::$entity[0];
    }
}
