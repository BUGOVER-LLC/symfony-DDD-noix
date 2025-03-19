<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\EventListener\Doctrine;

use App\Workspaces\Domain\Entity\Worker;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostRemoveEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postRemove, method: Events::postRemove, entity: Worker::class)]
final class WorkspaceWorkerDeleted
{
    public function __construct()
    {
    }

    public function postRemove(PostRemoveEventArgs $args)
    {
    }
}
