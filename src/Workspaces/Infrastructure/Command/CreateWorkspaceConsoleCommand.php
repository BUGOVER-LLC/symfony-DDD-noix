<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Command;

use App\Workspaces\Application\UseCase\AdminUseCaseInteractor;
use App\Workspaces\Application\UseCase\Command\CreateWorkspace\CreateWorkspaceCommand;
use PHPUnit\Framework\Assert;
use RuntimeException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'create:workspace')]
class CreateWorkspaceConsoleCommand extends Command
{
    public function __construct(private readonly AdminUseCaseInteractor $adminUseCaseInteractor)
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $workspaceName = $io->ask('Workspace name', '', function (?string $input) {
            if ($input) {
                Assert::assertIsString($input);

                return $input;
            }
        });

        $workspacePath = $io->ask('Workspace path', '', function (?string $input) {
            Assert::assertIsString($input);

            if (!filter_var($input, FILTER_VALIDATE_URL)) {
                throw new RuntimeException('Invalid url');
            }

            return $input;
        });

        $command = new CreateWorkspaceCommand($workspaceName, $workspacePath);
        $this->adminUseCaseInteractor->createWorkspace($command);

        return Command::SUCCESS;
    }
}
