<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Entity\User;
use App\User\Domain\Entity\UserProfile;
use App\User\Domain\Repository\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Override;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function add(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function findByUlid(string $ulid): ?User
    {
        return $this->find($ulid);
    }

    #[Override] public function findByEmail(string $email): ?User
    {
        return $this->findOneBy(['email' => $email]);
    }

    #[\Override] public function roleByCurrentWorkspace(string $userId): ?User
    {
        $qb = $this->createQueryBuilder('u');

        return $qb
            ->leftJoin(UserProfile::class, 'up', Join::WITH, 'u.id = up.user')
            ->where('u.currentWorkspace = up.workspace and u.id = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getSingleResult();
    }

    public function setCurrentWorkspace(string $userId, string $workspaceId): void
    {
        $qb = $this->createQueryBuilder('u');

        $qb
            ->update(User::class, 'u')
            ->set('u.currentWorkspace', ':workspaceId')
            ->setParameter('workspaceId', $workspaceId)
            ->getQuery()
            ->execute();
    }
}
