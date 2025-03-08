<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Command\CreateUser;

use App\Shared\Application\Command\CommandInterface;

readonly class CreateUserCommand implements CommandInterface
{
    public function __construct(public string $email, public string $password, public ?array $roles = null)
    {
    }
}
