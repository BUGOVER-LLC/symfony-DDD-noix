<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Security;

use App\Acl\Domain\Security\CanCheckHasInvitingUser;
use App\User\Domain\Entity\User;
use App\User\Infrastructure\DTO\InviteUserDTO;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class InviteHasAccessVoter extends Voter implements CanCheckHasInvitingUser
{
    private const string INVITE_USER = 'accessInviter';

    #[\Override] protected function supports(string $attribute, mixed $subject): bool
    {
        if ($attribute !== self::INVITE_USER || !$subject instanceof InviteUserDTO) {
            return false;
        }

        return true;
    }

    #[\Override] protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $roleHasInviteUser = count(array_intersect($token->getRoleNames(), [
            'WORKSPACE_FULL_MEMBER',
            'WORKSPACE_ADMIN',
            'WORKSPACE_OWNER',
            'CHANNEL_MANAGER',
        ]));

        if (!$roleHasInviteUser || !$this->canInvite($subject, $token->getUser())) {
            return false;
        }

        return true;
    }

    public function canInvite(InviteUserDTO $userInvitation, User $user): bool
    {
        return true;
    }
}
