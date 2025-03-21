<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Repository;

use App\Workspaces\Domain\Entity\WorkspaceRole;
use App\Workspaces\Domain\Repository\WorkspaceRoleRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkspaceRoleRepository extends ServiceEntityRepository implements WorkspaceRoleRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkspaceRole::class);
    }
}
