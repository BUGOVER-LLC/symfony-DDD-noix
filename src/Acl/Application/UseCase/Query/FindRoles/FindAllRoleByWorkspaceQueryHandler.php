<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoles;

use App\Acl\Application\Assembler\RoleAssembler;
use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Domain\Entity\Role;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindAllRoleByWorkspaceQueryHandler implements QueryHandlerInterface
{
    public function __construct(private RoleRepositoryInterface $roleRepository, private RoleAssembler $roleAssembler)
    {
    }

    /**
     * @param FindAllRoleByWorkspaceQuery $query
     * @return array<RoleDTO>
     */
    public function __invoke(FindAllRoleByWorkspaceQuery $query): array
    {
        $roles = $this->roleRepository->findAllRoleByWorkspace($query->workspace);

        return array_map(
            callback: fn(Role $role) => $this->roleAssembler->fromEntity($role),
            array: $roles
        );
    }
}
