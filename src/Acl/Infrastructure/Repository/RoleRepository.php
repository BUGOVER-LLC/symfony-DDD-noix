<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\Role;
use App\Acl\Domain\Repository\RoleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RoleRepository extends ServiceEntityRepository implements RoleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }
}
