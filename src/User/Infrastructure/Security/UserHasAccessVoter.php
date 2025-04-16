<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Security;

use _PHPStan_f2f2ddf44\Symfony\Component\Finder\Exception\AccessDeniedException;
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
    ) {
    }

    /**
     * Determines if the attribute and subject are supported by this voter.
     *
     * @param mixed $subject The subject to secure, e.g. an object the user wants to access or any other PHP type
     *
     * @psalm-assert-if-true TSubject $subject
     * @psalm-assert-if-true TAttribute $attribute
     */
    #[\Override] protected function supports(string $attribute, mixed $subject): bool
    {
        $this->user = $this->security->getUser();

        if (!$this->user->getCurrentWorkspace()) {
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
     * @param string $attribute
     * @param InviteUserDTO $subject
     * @param TokenInterface $token
     * @return bool
     */
    #[\Override] protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $invitation = $this->publicUseCaseInteractor->findInvitationByEmail(
            query: new FindInvitiationByUserQuery(
                email: $subject->getEmail(),
                workspaceId: $this->user->getCurrentWorkspace()?->getId(),
            )
        );

        if ($invitation?->invitation?->acceptedAt) {
            throw new AccessDeniedException();
        }

        return true;
    }
}
