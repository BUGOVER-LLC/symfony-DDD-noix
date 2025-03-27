<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UserHasAccessVoter extends Voter
{
    public const string INVITE_USER = 'accessInvite';

    public function __construct()
    {
    }

    #[\Override] protected function supports(string $attribute, mixed $subject): bool
    {
        if ($attribute !== self::INVITE_USER) {
            return false;
        }

        return true;
    }

    #[\Override] protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        return true;
    }
}
