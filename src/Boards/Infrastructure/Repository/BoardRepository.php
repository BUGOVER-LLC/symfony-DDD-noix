<?php

declare(strict_types=1);

namespace App\Boards\Infrastructure\Repository;

use App\Boards\Domain\Entity\Board;
use App\Boards\Domain\Repository\BoardRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BoardRepository extends ServiceEntityRepository implements BoardRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Board::class);
    }
}
