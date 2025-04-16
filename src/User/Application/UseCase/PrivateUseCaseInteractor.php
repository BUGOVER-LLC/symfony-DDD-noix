<?php

declare(strict_types=1);

namespace App\User\Application\UseCase;

use App\Shared\Application\Query\QueryBusInterface;
use App\User\Application\DTO\UserDto;
use App\User\Application\UseCase\Query\FindUserByEmail\FindUserByEmailQuery;
use App\User\Application\UseCase\Query\GetMe\GetMeQuery;
use App\User\Application\UseCase\Query\GetMe\GetMeQueryResult;

readonly class PrivateUseCaseInteractor
{
    public function __construct(private QueryBusInterface $queryBus)
    {
    }

    /**
     * @return GetMeQueryResult
     */
    public function getMe(): GetMeQueryResult
    {
        return $this->queryBus->execute(new GetMeQuery());
    }

    /**
     * @param string $email
     * @return ?UserDto
     */
    public function getUserByEmail(string $email)
    {
        return $this->queryBus->execute(new FindUserByEmailQuery($email));
    }
}
