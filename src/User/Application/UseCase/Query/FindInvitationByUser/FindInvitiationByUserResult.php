<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindInvitationByUser;

use App\Shared\Application\Command\Command;
use App\User\Application\DTO\UserInvitationDTO;

/**
 * @link FindInvitiationByUserQueryHandler
 */
readonly class FindInvitiationByUserResult extends Command
{
    public function __construct(
        public UserInvitationDTO $invitation
    )
    {
    }
}
