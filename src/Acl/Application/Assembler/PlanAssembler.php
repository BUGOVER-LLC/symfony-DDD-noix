<?php

declare(strict_types=1);

namespace App\Acl\Application\Assembler;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Domain\Entity\Plan;

/**
 * @TODO: this is experimental
 */
readonly class PlanAssembler
{
    public function toDto(Plan $plan): PlanDTO
    {
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

    public function toEntity(PlanDTO $planDTO): Plan
    {
        return (new Plan())
            ->setName($planDTO->name)
            ->setDescription($planDTO->description)
            ->setTrial($planDTO->trial)
            ->setPrice($planDTO->price)
            ->setActive($planDTO->active);
    }
}
