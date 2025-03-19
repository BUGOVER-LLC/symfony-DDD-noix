<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\EventListener\Doctrine;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Monolog\Attribute\WithMonologChannel;
use Psr\Log\LoggerInterface;

#[WithMonologChannel(channel: 'activity')]
final class ActivityLog implements EventSubscriber
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    #[\Override] public function getSubscribedEvents(): array
    {
        return [
            Events::preUpdate,
            Events::prePersist,
            Events::preRemove,
        ];
    }

    /* @noinspection PhpUnused */
    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        // Implement logic to log entity update
        $this->logger->info('Entity updated', ['entity' => \get_class($entity)]);
    }

    /* @noinspection PhpUnused */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        // Implement logic to log new entity creation
        $this->logger->info('Entity created', ['entity' => \get_class($entity)]);
    }

    /* @noinspection PhpUnused */
    public function preRemove(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        // Implement logic to log entity removal
        $this->logger->info('Entity removed', ['entity' => \get_class($entity)]);
    }
}
