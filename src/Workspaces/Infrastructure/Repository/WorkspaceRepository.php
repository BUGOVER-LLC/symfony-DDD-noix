<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Repository;

use App\Workspaces\Domain\Entity\Workspace;
use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class WorkspaceRepository extends ServiceEntityRepository implements WorkspaceRepositoryInterface
{
    private const string CACHE_KEY = 'workspace-';
    private array $entities = [];

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workspace::class);
    }

    #[\Override] public function add(Workspace $workspace): void
    {
        $manager = $this->getEntityManager();

        if (!\array_key_exists($workspace->getId(), $this->entities)) {
            $manager->persist($workspace);
            $manager->flush();

            $this->entities[$workspace->getId()] = $workspace;
        }
    }

    #[\Override] public function delete(Workspace $workspace): void
    {
        $manager = $this->getEntityManager();

        $manager->remove($workspace);
        $manager->flush();

        unset($this->entities[$workspace->getId()]);
    }

    #[\Override] public function findAllWorkspacesByUserId(string $userId): array
    {
        return $this
            ->createQueryBuilder('w')
            ->innerJoin('w.workers', 'workers', 'WITH', 'workers.user = :user_id')
            ->setParameter('user_id', $userId)
            ->getQuery()
            ->enableResultCache(3600, self::CACHE_KEY.$userId)
            ->getResult();
    }

    #[\Override] public function incrementWorkerCount(Workspace $workspace): void
    {
        $qb = $this->createQueryBuilder('w');
        $qb->where('w.id = :workspaceId');
        $qb->update();
        $qb->set('w.membersCount', 'w.membersCount + 1');
        $qb->setParameter('workspaceId', $workspace->getId());
        $qb->getQuery()->execute();
    }

    #[\Override] public function decrementWorkerCount(Workspace $workspace): void
    {
        $qb = $this->createQueryBuilder('w');
        $qb->where('w.id = :workspaceId');
        $qb->update();
        $qb->set('w.membersCount', 'w.membersCount - 1');
        $qb->setParameter('workspaceId', $workspace->getId());
        $qb->getQuery()->execute();
    }
}
