<?php

declare(strict_types=1);

namespace App\Media\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Media\Domain\Enum\Bucket;
use App\Messages\Domain\Entity\Message;
use App\Shared\Domain\Service\UlidService;

class SuperMedia
{
    private string $id;

    private string $name;

    private string $originalName;

    private string $extension;

    private int $size;

    private string $fullPath;

    private Bucket $bucket;

    private Message $message;

    private Channel $channel;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): SuperMedia
    {
        $this->name = $name;

        return $this;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): SuperMedia
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): SuperMedia
    {
        $this->extension = $extension;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): SuperMedia
    {
        $this->size = $size;

        return $this;
    }

    public function getFullPath(): string
    {
        return $this->fullPath;
    }

    public function setFullPath(string $fullPath): SuperMedia
    {
        $this->fullPath = $fullPath;

        return $this;
    }

    public function getBucket(): Bucket
    {
        return $this->bucket;
    }

    public function setBucket(Bucket $bucket): SuperMedia
    {
        $this->bucket = $bucket;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function setMessage(Message $message): SuperMedia
    {
        $this->message = $message;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): SuperMedia
    {
        $this->channel = $channel;

        return $this;
    }
}
