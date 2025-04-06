<?php

declare(strict_types=1);

namespace App\Workspaces\Presentation\Api;

use App\User\Infrastructure\Adapter\WorkspaceAdapter;
use App\Workspaces\Application\UseCase\Query\FindWorkspaceByUser\FindWorkspaceByUserQuery;
use App\Workspaces\Application\UseCase\QueryUseCaseInteractor;

class UserApi implements WorkspaceAdapter
{
    public function __construct(private readonly QueryUseCaseInteractor $queryInteractor)
    {
    }

    public function getWorkspacesByUserId(string $userId): array
    {
        return $this->queryInteractor->findWorkspacesByUser(new FindWorkspaceByUserQuery($userId));
    }
}
