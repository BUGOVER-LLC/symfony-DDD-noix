<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\EventListener\Doctrine;

use App\Workspaces\Application\UseCase\Command\IncrementWorker\IncrementWorkerCommand;
use App\Workspaces\Application\UseCase\QueryUseCaseInteractor;
use App\Workspaces\Domain\Entity\Worker;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::postFlush, method: Events::postFlush, entity: Worker::class)]
final class WorkspaceWorkerCreated
{
    public function __construct(private readonly QueryUseCaseInteractor $queryUseCaseInteractor)
    {
    }

    public function postFlush(PostFlushEventArgs $args)
    {
        $this->queryUseCaseInteractor->incrementWorker(new IncrementWorkerCommand());
    }
}
