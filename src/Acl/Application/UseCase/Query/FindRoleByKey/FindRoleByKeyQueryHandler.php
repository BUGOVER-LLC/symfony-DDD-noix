<?php

declare(strict_types=1);

namespace App\Acl\Application\UseCase\Query\FindRoleByKey;

use App\Acl\Application\Assembler\RoleAssembler;
use App\Acl\Application\DTO\RoleDTO;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

readonly class FindRoleByKeyQueryHandler implements QueryHandlerInterface
{
    public function __construct(private RoleRepositoryInterface $roleRepository, private RoleAssembler $roleAssembler)
    {
    }

    public function __invoke(FindRoleByKeyQuery $byKeyQuery): ?RoleDTO
    {
        $role = $this->roleRepository->findByKey($byKeyQuery->key);

        return $role ? $this->roleAssembler->fromEntity($role) : null;
    }
}
