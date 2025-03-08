<?php

declare(strict_types=1);

namespace App\Messages\Infrastructure\Repository;

use App\Messages\Domain\Entity\MessageReaction;
use App\Messages\Domain\Repository\MessageReactionRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageReactionRepository extends ServiceEntityRepository implements MessageReactionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageReaction::class);
    }
}
