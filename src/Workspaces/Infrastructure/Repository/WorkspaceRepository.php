<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Repository;

use App\Workspaces\Domain\Entity\Workspace;
use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkspaceRepository extends ServiceEntityRepository implements WorkspaceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workspace::class);
    }

    #[\Override] public function add(Workspace $workspace): void
    {
        $this->getEntityManager()->persist($workspace);
        $this->getEntityManager()->flush();
    }

    #[\Override] public function findAllWorkspacesByUserId(int $userId): array
    {
        // TODO: Implement findAllWorkspacesByUserId() method.
    }
}
