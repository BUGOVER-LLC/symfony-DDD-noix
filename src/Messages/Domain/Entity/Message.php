<?php

declare(strict_types=1);

namespace App\Messages\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class Message
{
    use Timestampable;

    private string $id;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }
}
