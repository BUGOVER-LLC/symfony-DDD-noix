<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoleByName;

use App\Acl\Application\Assembler\RoleAssembler;
use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindRoleByNameQueryHandler implements QueryHandlerInterface
{
    public function __construct(private RoleRepositoryInterface $roleRepository, private RoleAssembler $roleAssembler)
    {
    }

    public function __invoke(FindRoleByNameQuery $byNameQuery): ?RoleDTO
    {
        $role = $this->roleRepository->findByName($byNameQuery->name);

        return $role ? $this->roleAssembler->fromEntity($role) : null;
    }
}
