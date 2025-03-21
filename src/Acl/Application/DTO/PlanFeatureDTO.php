<?php

declare(strict_types=1);

namespace App\Acl\Application\DTO;

readonly class PlanFeatureDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
    )
    {
    }
}
