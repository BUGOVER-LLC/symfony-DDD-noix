<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindUser;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\User\Application\DTO\UserDTO;
use App\User\Domain\Repository\UserRepositoryInterface;

readonly class FindUserQueryHandler implements QueryHandlerInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(FindUserQuery $query): FindUserQueryResult
    {
        $user = $this->userRepository->findByUlid($query->userId);
        $userDTO = $user instanceof \App\User\Domain\Entity\User ? UserDto::fromEntity($user) : null;

        return new FindUserQueryResult($userDTO);
    }
}
