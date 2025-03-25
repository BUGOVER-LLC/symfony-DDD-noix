<?php

declare(strict_types=1);

namespace App\Acl\Application\Assembler;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Domain\Entity\Plan;

readonly class PlanAssembler
{
    private array $entity;

    public function fromEntity(Plan $plan): PlanDTO
    {
        $this->entity[$plan->getId()] = $plan;

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
        return $id ? $this->entity[$id] : $this->entity;
    }
}
