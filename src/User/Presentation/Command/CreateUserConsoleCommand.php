<?php

declare(strict_types=1);

namespace App\User\Presentation\Command;

use App\Shared\Domain\Security\Role;
use App\User\Application\DTO\UserDto;
use App\User\Application\UseCase\AdminUseCaseInteractor;
use App\User\Application\UseCase\Command\CreateUser\CreateUserCommand;
use App\User\Application\UseCase\Command\SetCurrentWorkspace\SetCurrentWorkspaceCommand;
use App\User\Application\UseCase\PrivateUseCaseInteractor;
use App\User\Infrastructure\Adapter\WorkspaceAdapter;
use App\Workspaces\Application\UseCase\DTO\WorkspaceDTO;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Webmozart\Assert\Assert;

#[AsCommand(
    name: 'create:user',
    description: '
    curl -X POST -H "Content-Type: application/json" http://localhost:888/api/auth/v1/login -d {"email": "rferwgfre@mail.comewfew", "password": "few"},
    curl -H "Authorization: Bearer token" http://localhost:888/api/user/me,
    curl -X POST -H "Content-Type: application/json" http://localhost:888/api/auth/refresh-token -d {refresh_token: token},
'
)]
class CreateUserConsoleCommand extends Command
{
    public function __construct(
        private readonly AdminUseCaseInteractor $adminCommandInteractor,
        private readonly PrivateUseCaseInteractor $privateUseCaseInteractor,
        private readonly WorkspaceAdapter $workspaceAdapter,
    )
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $io->ask(question: 'email', validator: function (?string $input) use ($io) {
            Assert::email($input, 'Invalid email value');

            $existsWorkspaces = $this->workspaceAdapter->getWorkspacesByEmail($input);

            if (!empty($existsWorkspaces)) {
                $this->choiseWorkspace(io: $io, existsWorkspaces: $existsWorkspaces, userEmail: $input);
            }

            return $input;
        });

        $password = $io->ask('password', null, function (?string $input) {
            Assert::notEmpty($input, 'Invalid password value');

            return $input;
        });

        $role = $io->ask(
            question: 'role',
            default: Role::ROLE_WORKSPACE_OWNER,
            validator: function (?string $input) {
                Assert::notEmpty($input, 'Role cannot be empty');

                return $input;
            }
        );

        $this->adminCommandInteractor->createUser(
            command: new CreateUserCommand(
                email: $email,
                password: $password,
                roles: explode(',', $role),
            )
        );

        return Command::SUCCESS;
    }

    private function choiseWorkspace(SymfonyStyle $io, array $existsWorkspaces, string $userEmail)
    {
        $choise = $io->choice(
            question: 'You are already having a workspace',
            choices: array_map(static fn(WorkspaceDTO $workspace) => $workspace->name, $existsWorkspaces),
        );

        if ($choise) {
            foreach ($existsWorkspaces as $existsWorkspace) {
                if ($existsWorkspace->name === $choise) {
                    $choisedWorkspaceId = $existsWorkspace->id;
                    break;
                }
            }

            $user = $this->privateUseCaseInteractor->getUserByEmail($userEmail);
            Assert::isInstanceOf($user, UserDto::class, 'User not found');
            $this->adminCommandInteractor->setCurrentWorkspace(
                command: new SetCurrentWorkspaceCommand(userId: $user->id, workspaceId: $choisedWorkspaceId)
            );
        }
    }
}
