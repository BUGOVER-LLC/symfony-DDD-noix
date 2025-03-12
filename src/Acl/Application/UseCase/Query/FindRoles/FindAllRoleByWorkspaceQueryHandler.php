<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoles;

use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindAllRoleByWorkspaceQueryHandler implements QueryHandlerInterface
{
    public function __construct(private RoleRepositoryInterface $roleRepository)
    {
    }

    public function __invoke(FindAllRoleByWorkspaceQuery $query): RoleDTO
    {
        $role = $this->roleRepository->findAllRoleByWorkspace($query->workspace);

        return new RoleDTO($role->getId(), $role->getName(), $role->getKey());
    }
}
