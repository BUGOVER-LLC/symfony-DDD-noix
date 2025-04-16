<?php

declare(strict_types=1);

namespace App\Media\Infrastructure\Database\Repository;

use App\Media\Domain\Entity\Image;
use App\Media\Domain\Repository\DocumentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DocumentRepository extends ServiceEntityRepository implements DocumentRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    public function add(Image $document): void
    {
        $qb = $this->getEntityManager();

        $qb->persist($document);
        $qb->flush();
    }
}
