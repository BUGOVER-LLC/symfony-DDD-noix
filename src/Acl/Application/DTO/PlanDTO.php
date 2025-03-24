<?php

declare(strict_types=1);

namespace App\Acl\Application\DTO;

use App\Acl\Application\Assembler\PlanAssembler;
use DateTimeImmutable;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Schema;

#[Schema(schema: 'PlanDTO', items: new Items(ref: PlanDTO::class))]
readonly class PlanDTO extends PlanAssembler
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public float $price,
        public bool $trial,
        public bool $active,
        public DateTimeImmutable $createdAt,
    )
    {
    }
}
