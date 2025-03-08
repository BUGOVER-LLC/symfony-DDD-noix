<?php

declare(strict_types=1);

namespace App\Acl\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;

class Role
{
    use Timestampable;

    private string $id;

    private string $name;

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
