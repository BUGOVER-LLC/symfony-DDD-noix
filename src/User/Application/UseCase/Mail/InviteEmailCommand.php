<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Mail;

use App\Shared\Application\Command\Command;

/**
 * @link InviteUserCommandHandler
 */
readonly class InviteEmailCommand extends Command
{
    public function __construct(
        public string $from,
        public string $role,
        public ?string $channel = null,
    )
    {
    }
}
