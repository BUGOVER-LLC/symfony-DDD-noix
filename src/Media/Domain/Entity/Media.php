<?php

declare(strict_types=1);

namespace App\Media\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;

class Media extends SuperMedia
{
    use Timestampable;

    private string $id;

    private string $type;

    private int $resolutionX;

    private int $resolutionY;

    private ?int $duration = null;
}
