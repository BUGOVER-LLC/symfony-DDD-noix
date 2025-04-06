<?php

declare(strict_types=1);

namespace App\Workspaces\Application\UseCase\Query\FindWorkspaceByUserEmail;

use App\Shared\Application\Query\Query;

/**
 * @link FindWorkspaceByUserEmailQueryHandler
 */
readonly class FindWorkspaceByUserEmailQuery extends Query
{
    public function __construct(public string $email)
    {
    }
}
