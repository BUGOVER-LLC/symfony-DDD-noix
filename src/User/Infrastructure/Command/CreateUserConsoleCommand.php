<?php

declare(strict_types=1);

namespace App\User\Infrastructure\Command;

use App\Shared\Domain\Security\Role;
use App\User\Application\UseCase\AdminUseCaseInteractor;
use App\User\Application\UseCase\Command\CreateUser\CreateUserCommand;
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
    )
    {
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $io->ask('email', null, function (?string $input) {
            Assert::email($input, 'Invalid email value');

            return $input;
        });

        $password = $io->ask('password', null, function (?string $input) {
            Assert::notEmpty($input, 'Invalid password value');

            return $input;
        });

        $role = $io->ask(
            'role',
            Role::ROLE_WORKSPACE_OWNER,
            function (?string $input) {
                Assert::notEmpty($input, 'Role cannot be empty');

                return $input;
            }
        );

        $command = new CreateUserCommand($email, $password, explode(',', $role));
        $this->adminCommandInteractor->createUser($command);

        return Command::SUCCESS;
    }
}
