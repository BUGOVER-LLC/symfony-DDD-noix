<?php

declare(strict_types=1);

namespace App\Acl\Application\Assembler;

use App\Acl\Application\DTO\PlanDTO;
use App\Acl\Domain\Entity\Plan;

/**
 * @TODO: this is experimental
 */
class PlanAssembler
{
    private static Plan $entity;

    public static function toDto(Plan $plan): PlanDTO
    {
        self::$entity = $plan;

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

    public static function toEntity(): Plan
    {
        return self::$entity;
    }
}
