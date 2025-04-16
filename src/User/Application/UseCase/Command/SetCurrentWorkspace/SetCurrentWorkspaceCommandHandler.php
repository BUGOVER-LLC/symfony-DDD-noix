<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Command\SetCurrentWorkspace;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\User\Domain\Repository\UserRepositoryInterface;

readonly class SetCurrentWorkspaceCommandHandler implements CommandHandlerInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function __invoke(SetCurrentWorkspaceCommand $command): void
    {
        $this->userRepository->setCurrentWorkspace(
            userId: $command->userId,
            workspaceId: $command->workspaceId
        );
    }
}
