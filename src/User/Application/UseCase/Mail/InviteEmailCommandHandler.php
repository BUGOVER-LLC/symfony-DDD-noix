<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Mail;

use App\Shared\Application\Command\Command;

readonly class InviteEmailCommandHandler extends Command
{
    public function __construct(InviteEmailCommand $emailCommand)
    {
    }
}
