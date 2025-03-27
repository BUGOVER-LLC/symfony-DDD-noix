<?php

declare(strict_types=1);

namespace App\User\Application\UseCase;

use App\Shared\Application\Command\CommandBusInterface;
use App\User\Application\UseCase\Command\CreateUser\CreateUserCommand;
use App\User\Application\UseCase\Mail\InviteEmailCommand;

readonly class AdminUseCaseInteractor
{
    public function __construct(private CommandBusInterface $commandBus)
    {
    }

    public function createUser(CreateUserCommand $command): void
    {
        $this->commandBus->execute($command);
    }

    public function inviteUser(InviteEmailCommand $command)
    {
        $this->commandBus->execute($command);
    }
}
