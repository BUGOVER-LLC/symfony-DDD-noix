<?php

declare(strict_types=1);

namespace App\Media\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Media\Domain\Enum\Bucket;
use App\Messages\Domain\Entity\Message;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;

class Media
{
    use Timestampable;

    private string $id;

    private string $name;

    private string $originalName;

    private int $size;

    private string $fullPath;

    private string $type;

    private string $extension;

    private int $resolutionX;

    private int $resolutionY;

    private ?int $duration = null;

    private Bucket $bucket;

    private Message $message;

    private Channel $channel;
}
