<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Command;

use App\Workspaces\Domain\Repository\WorkspaceRepositoryInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'create:workspace')]
class CreateWorkspaceCommand extends Command
{
    public function __construct(private readonly WorkspaceRepositoryInterface $workspaceRepository)
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
    }
}
