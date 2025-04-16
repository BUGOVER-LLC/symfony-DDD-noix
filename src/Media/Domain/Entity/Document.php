<?php

declare(strict_types=1);

namespace App\Media\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Messages\Domain\Entity\Message;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Media\Domain\Enum\Bucket;
use App\Shared\Domain\Service\UlidService;

class Document
{
    use Timestampable;

    private string $id;

    private string $name;

    private string $originalName;

    private string $extension;

    private int $size;

    private int $originalSize;

    private string $fullPath;

    private Bucket $bucket;

    private Message $message;

    private Channel $channel;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function setId(string $id): Document
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Document
    {
        $this->name = $name;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): Document
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): Document
    {
        $this->extension = $extension;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): Document
    {
        $this->size = $size;

        return $this;
    }

    public function getOriginalSize(): int
    {
        return $this->originalSize;
    }

    public function setOriginalSize(int $originalSize): Document
    {
        $this->originalSize = $originalSize;

        return $this;
    }

    public function getFullPath(): string
    {
        return $this->fullPath;
    }

    public function setFullPath(string $fullPath): Document
    {
        $this->fullPath = $fullPath;

        return $this;
    }

    public function getBucket(): Bucket
    {
        return $this->bucket;
    }

    public function setBucket(Bucket $bucket): Document
    {
        $this->bucket = $bucket;

        return $this;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): Document
    {
        $this->message = $message;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): Document
    {
        $this->channel = $channel;

        return $this;
    }
}
