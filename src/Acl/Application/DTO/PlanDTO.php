<?php

declare(strict_types=1);

namespace App\Acl\Application\DTO;

use OpenApi\Attributes\Items;
use OpenApi\Attributes\Schema;

#[Schema(schema: 'PlanDTO', items: new Items(ref: PlanDTO::class))]
readonly class PlanDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float $price,
        public bool $trial,
        public bool $active,
    )
    {
    }
}
