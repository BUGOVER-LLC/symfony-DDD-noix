<?php

declare(strict_types=1);

namespace App\Media\Infrastructure\Database\EventListener;

use App\Media\Infrastructure\Database\Types\BucketType;
use App\Media\Domain\Enum\Bucket;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\Common\EventSubscriber;
use Doctrine\DBAL\Exception;
use Doctrine\Migrations\Event\MigrationsEventArgs;
use Doctrine\Migrations\Events;
use Doctrine\ORM\EntityManagerInterface;

#[AsDoctrineListener(Events::onMigrationsMigrating)]
class MigrationStartedListener implements EventSubscriber
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::onMigrationsMigrating,
        ];
    }

    /**
     * @throws Exception
     */
    public function onMigrationsMigrating(MigrationsEventArgs $args): void
    {
        $bucketType = (new BucketType())->getName();
        $types = array_column(Bucket::cases(), 'name');
        $types = "'".implode("', '", $types)."'";

        $conn = $this->entityManager->getConnection();
        $sqlCommon = "DO
$$
    BEGIN
        CREATE TYPE $bucketType AS ENUM ($types);
    EXCEPTION
        WHEN duplicate_object THEN null;
    END
$$";
        $conn->executeQuery($sqlCommon);
    }
}
