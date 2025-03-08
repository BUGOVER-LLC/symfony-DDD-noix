<?php

declare(strict_types=1);

namespace App\User\Domain\Entity;

use App\Shared\Application\Doctrine\Timestamp\Timestampable;
use Gesdinet\JWTRefreshTokenBundle\Entity\RefreshToken as BaseRefreshToken;

class RefreshToken extends BaseRefreshToken
{
    use Timestampable;

    private array $scopes = [];

    public function getScopes(): array
    {
        return $this->scopes;
    }

    public function setScopes(array $scopes = []): RefreshToken
    {
        $this->scopes = $scopes;

        return $this;
    }
}
