<?php

declare(strict_types=1);

namespace App\Workspaces\Presentation\Command;

use App\Acl\Application\DTO\PlanDTO;
use App\Workspaces\Application\UseCase\AdminUseCaseInteractor;
use App\Workspaces\Application\UseCase\Command\CreateWorkspace\CreateWorkspaceCommand;
use App\Workspaces\Infrastructure\Adapter\AclAdapterInterface;
use PHPUnit\Framework\Assert;
use RuntimeException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use function PHPUnit\Framework\assertInstanceOf;

#[AsCommand(name: 'create:workspace')]
class CreateWorkspaceConsoleCommand extends Command
{
    public function __construct(
        private readonly AdminUseCaseInteractor $adminUseCaseInteractor,
        private readonly AclAdapterInterface $aclAdapter,
    )
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $workspaceName = $io->ask('Workspace name', '', function (?string $input) {
            Assert::assertNotNull($input);
            Assert::assertGreaterThan(4, $input);

            return $input;
        });

        /* @var PlanDTO[] $plans */
        $plans = $this->aclAdapter->getPlans();
        $choisedPlan = $this->chooseFindPlan($io, $plans);

        $workspacePath = $io->ask('Workspace path', '', function (?string $input) {
            Assert::assertIsString($input);

            if (!filter_var($input, FILTER_VALIDATE_URL)) {
                throw new RuntimeException('Invalid URL', 400);
            }

            return $input;
        });

        $command = new CreateWorkspaceCommand($workspaceName, $workspacePath, $choisedPlan);
        $this->adminUseCaseInteractor->createWorkspace($command);

        return Command::SUCCESS;
    }

    /**
     * @param SymfonyStyle $io
     * @param PlanDTO[] $plans
     * @return PlanDTO
     */
    private function chooseFindPlan(SymfonyStyle $io, array $plans): PlanDTO
    {
        $choisedPlanName = $io->choice(
            'Choose a plan for your Workspace',
            array_map(static fn(PlanDTO $item) => $item->name, $plans),
        );

        Assert::assertIsString($choisedPlanName, 'Invalid data');

        foreach ($plans as $plan) {
            if ($plan->name === $choisedPlanName) {
                $choisedPlan = $plan;
                break;
            }
        }

        Assert::assertInstanceOf(PlanDTO::class, $choisedPlan, 'None correct plan');

        return $choisedPlan;
    }
}
