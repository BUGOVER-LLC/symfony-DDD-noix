<?php

declare(strict_types=1);

namespace App\Messages\Domain\Entity;

use App\Channels\Domain\Entity\Channel;
use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;
use App\User\Domain\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Message
{
    use Timestampable;

    private string $id;

    private array $body;

    private Channel $channel;

    private User $author;

    private Collection $documents;

    private Collection $images;

    private Collection $videos;

    private Collection $archives;

    public function __construct()
    {
        $this->id = UlidService::generate();

        $this->documents = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->archives = new ArrayCollection();
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function setImages(Collection $image): Message
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
        }

        return $this;
    }

    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function setVideos(Collection $video): Message
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
        }

        return $this;
    }

    public function getArchives(): Collection
    {
        return $this->archives;
    }

    public function setArchives(Collection $archives): Message
    {
        $this->archives = $archives;

        return $this;
    }

    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function setDocuments(Collection $document): Message
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
        }

        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): Message
    {
        $this->body = $body;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): Message
    {
        $this->author = $author;

        return $this;
    }

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel(Channel $channel): Message
    {
        $this->channel = $channel;

        return $this;
    }
}
