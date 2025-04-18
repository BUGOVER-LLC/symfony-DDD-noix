<?php

declare(strict_types=1);

namespace App\Media\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Messages\Domain\Entity\Message;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Media\Domain\Enum\Bucket;
use App\Shared\Domain\Service\UlidService;

class Document extends SuperMedia
{
    use Timestampable;

    private string $id;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
