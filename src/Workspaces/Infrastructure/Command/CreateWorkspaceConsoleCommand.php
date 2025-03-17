<?php

declare(strict_types=1);

namespace App\Workspaces\Infrastructure\Command;

use App\Acl\Application\QueryInteractor;
use App\Acl\Application\UseCase\Query\FindPlans\FindAllPlanQuery;
use App\Acl\Domain\Entity\Plan;
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
    public function __construct(
        private readonly AdminUseCaseInteractor $adminUseCaseInteractor,
        private readonly QueryInteractor $queryInteractor
    )
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

        /* @var Plan[] $plans */
        $plans = $this->queryInteractor->findAllPlanQuery(new FindAllPlanQuery());
        $choisedPlan = $this->choiseFindPlan($io, $plans);

        if (!$choisedPlan) {
            throw new RuntimeException('None correct plan');
        }

        $workspacePath = $io->ask('Workspace path', '', function (?string $input) {
            Assert::assertIsString($input);

            if (!filter_var($input, FILTER_VALIDATE_URL)) {
                throw new RuntimeException('Invalid URL');
            }

            return $input;
        });

        $command = new CreateWorkspaceCommand($workspaceName, $workspacePath, $choisedPlan);
        $this->adminUseCaseInteractor->createWorkspace($command);

        return Command::SUCCESS;
    }

    private function choiseFindPlan(SymfonyStyle $io, array $plans): ?Plan
    {
        $choisedPlanName = $io->choice(
            'Choise plan for your Workspace',
            array_map(static fn(Plan $item) => $item->getName(), $plans)
        );

        if (!$choisedPlanName) {
            throw new RuntimeException('Invalid data');
        }

        foreach ($plans as $plan) {
            if ($plan->getName() === $choisedPlanName) {
                $choisedPlan = $plan;
                break;
            }
        }

        return $choisedPlan ?? null;
    }
}
