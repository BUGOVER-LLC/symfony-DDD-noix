<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\Role;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
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

    #[\Override] public function findAllRoleByWorkspace(string $workspace): Role
    {
        $query = $this->createQueryBuilder('r');

        return $query
            ->leftJoin('', '')
            ->setParameter('w', $workspace)
            ->getQuery()
            ->getResult();
    }
}
