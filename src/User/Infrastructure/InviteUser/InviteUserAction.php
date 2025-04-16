<?php

declare(strict_types=1);

namespace App\User\Infrastructure\InviteUser;

use App\User\Application\UseCase\AdminUseCaseInteractor;
use App\User\Application\UseCase\Mail\InviteEmailCommand;
use App\User\Domain\Entity\UserInvitation;
use App\User\Domain\Repository\UserInvitationRepositoryInterface;
use App\User\Infrastructure\DTO\InviteUserDTO;
use App\Workspaces\Infrastructure\Adapter\AclAdapterInterface;
use Override;
use Symfony\Bundle\SecurityBundle\Security;

final class InviteUserAction implements InviteUserActionInterface
{
    public function __construct(
        private readonly AdminUseCaseInteractor $adminUseCaseInteractor,
        private UserInvitationRepositoryInterface $invitationRepository,
        private readonly AclAdapterInterface $aclAdapter,
        private readonly Security $security,
    )
    {
    }

    #[Override] public function invite(InviteUserDTO $payload)
    {
        $this->adminUseCaseInteractor->inviteUser(
            command: new InviteEmailCommand(
                from: $payload->getEmail(), role: $payload->getRole(), channel: $payload->getChannel(),
            )
        );

        $role = $this->aclAdapter->getRoleByName($payload->getRole());

        $invitation = new UserInvitation();
        $invitation->setEmail($payload->getEmail());
        $invitation->setRole($role->toEntity($role->id));
        $invitation->setWorkspace($this->security->getToken()->getUser()->getCurrentWorkspace());
//        $invitation->setChannel($payload->getChannel());

        $this->invitationRepository->add($invitation);
    }
}
