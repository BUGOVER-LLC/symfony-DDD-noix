<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\Role;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use App\Workspaces\Domain\Entity\Workspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoleRepository extends ServiceEntityRepository implements RoleRepositoryInterface
{
    private array $entities;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }

    #[\Override] public function add(Role $role)
    {
        $this->getEntityManager()->persist($role);
        $this->getEntityManager()->flush();
        $this->entities[$role->getId()] = $role;
    }

    #[\Override] public function findAllRoleByWorkspace(string $workspace): array
    {
        $query = $this->createQueryBuilder('r');

        return $query
            ->innerJoin(Workspace::class, 'w', 'WITH', 'w.id = :workspace')
            ->setParameter('workspace', $workspace)
            ->getQuery()
            ->getResult();
    }
}
