<?php

declare(strict_types=1);

namespace App\Shared\Domain\Aggregate;

use App\Shared\Domain\Service\UlidService;

class Id
{
    public static function makeUlid(): string
    {
        return UlidService::generate();
    }
}
