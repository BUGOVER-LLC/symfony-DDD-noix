<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Service\UlidService;
use Webmozart\Assert\Assert;

class GlobalUserId
{
    private string $id;

    public function __construct(string $id)
    {
        Assert::true(UlidService::isValid($id));
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
