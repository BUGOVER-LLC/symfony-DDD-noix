<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\EventListener\Doctrine;

use App\Workspaces\Domain\Entity\Worker;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postFlush, method: Events::postFlush, entity: Worker::class)]
class WorkspaceWorkerCreated
{
    public function __construct()
    {
    }

    public function postFlush(PostFlushEventArgs $args)
    {
    }
}
