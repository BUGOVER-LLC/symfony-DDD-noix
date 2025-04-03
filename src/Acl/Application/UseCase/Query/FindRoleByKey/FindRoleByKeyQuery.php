<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoleByKey;

use App\Shared\Application\Query\Query;

/**
 * @link FindRoleByKeyQueryHandler
 */
readonly class FindRoleByKeyQuery extends Query
{
    public function __construct(public string $key)
    {
    }
}
