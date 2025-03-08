<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindUser;

use App\User\Application\DTO\UserDTO;

readonly class FindUserQueryResult
{
    public function __construct(public UserDTO $user)
    {
    }
}
