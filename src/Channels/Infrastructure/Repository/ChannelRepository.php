<?php

declare(strict_types=1);

namespace App\Channels\Infrastructure\Repository;

use App\Channels\Domain\Entity\Channel;
use App\Channels\Domain\Repository\ChannelRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ChannelRepository extends ServiceEntityRepository implements ChannelRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Channel::class);
    }

    /**
     * @param string $userId
     * @return Channel[]
     */
    public function findAllChannelsByUserId(string $userId): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.members', 'u')
            ->where('u.id = :user')
            ->setParameter('user', $userId)
            ->getQuery()
            ->getResult();
    }

    #[\Override] public function getTotalConnectedCount(string $channelId): int
    {
        return $this->createQueryBuilder('c')
            ->select('c.totalConnected')
            ->where('c.id = :channel')
            ->setParameter('channel', $channelId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    #[\Override] public function getMembersCount(string $channelId): int
    {
        return $this->createQueryBuilder('c')
            ->select('c.membersCount')
            ->where('c.id = :channel')
            ->setParameter('channel', $channelId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
