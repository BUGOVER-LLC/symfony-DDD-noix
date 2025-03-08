<?php

declare(strict_types=1);

namespace App\User\Application\UseCase;

use App\Shared\Application\Query\QueryBusInterface;
use App\User\Application\UseCase\Query\GetMe\GetMeQuery;
use App\User\Application\UseCase\Query\GetMe\GetMeQueryResult;

readonly class PrivateUseCaseInteractor
{
    public function __construct(private QueryBusInterface $queryBus)
    {
    }

    public function getMe(): GetMeQueryResult
    {
        return $this->queryBus->execute(new GetMeQuery());
    }
}
