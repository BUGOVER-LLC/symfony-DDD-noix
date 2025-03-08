<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindUserByEmail;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\User\Application\DTO\UserDTO;
use App\User\Domain\Repository\UserRepositoryInterface;
use Exception;

readonly class FindUserByEmailQueryHandler implements QueryHandlerInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(FindUserByEmailQuery $query): UserDTO
    {
        $user = $this->userRepository->findByEmail($query->email);

        if (!$user instanceof \App\User\Domain\Entity\User) {
            throw new Exception('User not found');
        }

        return UserDTO::fromEntity($user);
    }
}
