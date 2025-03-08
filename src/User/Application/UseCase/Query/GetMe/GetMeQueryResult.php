<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\GetMe;

use App\User\Application\DTO\UserDTO;

readonly class GetMeQueryResult
{
    public function __construct(public UserDTO $user)
    {
    }
}
