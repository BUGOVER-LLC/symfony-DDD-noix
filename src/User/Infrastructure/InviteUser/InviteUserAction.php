<?php

declare(strict_types=1);

namespace App\User\Infrastructure\InviteUser;

use App\User\Application\UseCase\AdminUseCaseInteractor;
use App\User\Application\UseCase\Mail\InviteEmailCommand;
use App\User\Infrastructure\DTO\InviteUserDTO;

final class InviteUserAction implements InviteUserActionInterface
{
    private const string TEMPLATE = 'email.user-invitation.html';

    public function __construct(private readonly AdminUseCaseInteractor $adminUseCaseInteractor)
    {
    }

    #[\Override] public function invite(InviteUserDTO $payload)
    {
        $this->adminUseCaseInteractor->inviteUser(
            new InviteEmailCommand(
                $payload->getEmail(),
                self::TEMPLATE,
            )
        );
    }
}
