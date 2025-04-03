<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Security;

use App\User\Application\UseCase\PublicUseCaseInteractor;
use App\User\Application\UseCase\Query\FindInvitationByUser\FindInvitiationByUserQuery;
use App\User\Domain\Entity\User;
use App\User\Infrastructure\DTO\InviteUserDTO;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class UserHasAccessVoter extends Voter
{
    private const string INVITE_USER = 'accessInvite';

    private User|UserInterface $user;

    public function __construct(
        private readonly PublicUseCaseInteractor $publicUseCaseInteractor,
        private readonly Security $security,
    )
    {
    }

    #[\Override] protected function supports(string $attribute, mixed $subject): bool
    {
        $this->user = $this->security->getUser();

        if (!$this->user->getCurrentWorkspace()?->getId()) {
            return false;
        }

        if ($attribute !== self::INVITE_USER) {
            return false;
        }

        return true;
    }

    /**
     * Perform a single access check operation on a given attribute, subject and token.
     * It is safe to assume that $attribute and $subject already passed the "supports()" method check.
     *
     * @param TAttribute $attribute
     * @param InviteUserDTO $subject
     */
    #[\Override] protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $result = $this->publicUseCaseInteractor->findInvitationByEmail(
            new FindInvitiationByUserQuery(
                $subject->getEmail(),
                $this->user?->getCurrentWorkspace()?->getId(),
            )
        );

        if ($result->invitation->acceptedAt) {
            return false;
        }

        return true;
    }
}
