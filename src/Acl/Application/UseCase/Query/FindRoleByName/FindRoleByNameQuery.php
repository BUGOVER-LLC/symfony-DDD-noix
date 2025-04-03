<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoleByName;

use App\Shared\Application\Query\Query;

/**
 * @link FindRoleByKeyQueryHandler
 */
readonly class FindRoleByNameQuery extends Query
{
    public function __construct(public string $name)
    {
    }
}
