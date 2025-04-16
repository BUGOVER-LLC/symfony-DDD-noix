<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Query\FindWorkspaceByUser;

use App\Shared\Application\Query\Query;

/**
 * @link FindWorkspaceByUserEmailQueryHandler
 */
readonly class FindWorkspaceByUserQuery extends Query
{
    public function __construct(public string $userId)
    {
    }
}
