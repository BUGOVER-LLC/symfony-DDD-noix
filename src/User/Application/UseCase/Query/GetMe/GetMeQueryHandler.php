<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\GetMe;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Domain\Security\UserFetcherInterface;
use App\User\Application\DTO\UserDTO;
use App\User\Domain\Repository\UserRepositoryInterface;

readonly class GetMeQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserFetcherInterface $userFetcher
    )
    {
    }

    public function __invoke(GetMeQuery $query): GetMeQueryResult
    {
        $user = $this->userRepository->findByUlid($this->userFetcher->requiredUser()->getId());
        $userDTO = $user instanceof \App\User\Domain\Entity\User ? UserDTO::fromEntity($user) : null;

        return new GetMeQueryResult($userDTO);
    }
}
