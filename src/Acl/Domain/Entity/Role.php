<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class Role
{
    use Timestampable;

    private string $id;

    private string $key;

    private string $name;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Role
    {
        $this->key = $key;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Role
    {
        $this->name = $name;

        return $this;
    }
}
