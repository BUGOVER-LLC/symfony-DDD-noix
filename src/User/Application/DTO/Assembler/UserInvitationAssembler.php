<?php

declare(strict_types=1);

namespace App\User\Application\DTO\Assembler;

use App\User\Application\DTO\UserInvitationDTO;
use App\User\Domain\Entity\UserInvitation;

readonly class UserInvitationAssembler
{
    public static function fromEntity(UserInvitation $userInvitation): UserInvitationDTO
    {
        return new UserInvitationDTO(
            id: $userInvitation->getId(),
            email: $userInvitation->getEmail(),
            token: $userInvitation->getToken(),
            acceptedAt: $userInvitation->getAcceptedAt(),
            createdAt: $userInvitation->getCreatedAt(),
        );
    }
}
