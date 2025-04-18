<?php

declare(strict_types=1);

namespace App\Oauth\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use App\Shared\Domain\Service\UlidService;

class OauthToken
{
    use Timestampable;

    private string $id;

    private string $token;

    public function __construct()
    {
        $this->id = UlidService::generate();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): OauthToken
    {
        $this->token = $token;

        return $this;
    }
}
