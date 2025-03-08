<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Repository;

use App\Acl\Domain\Entity\PlanRole;
use App\Acl\Domain\Repository\PlanRoleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlanRoleRepository extends ServiceEntityRepository implements PlanRoleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanRole::class);
    }
}
