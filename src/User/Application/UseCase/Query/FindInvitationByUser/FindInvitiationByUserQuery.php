<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindInvitationByUser;

use App\Shared\Application\Query\Query;

/**
 * @link FindInvitiationByUserQueryHandler
 */
readonly class FindInvitiationByUserQuery extends Query
{
    public function __construct(
        public string $email,
        public string $workspaceId,
    )
    {
    }
}
