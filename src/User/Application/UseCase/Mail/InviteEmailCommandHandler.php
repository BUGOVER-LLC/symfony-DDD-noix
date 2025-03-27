<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Mail;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\Service\SendEmailService;

readonly class InviteEmailCommandHandler implements CommandHandlerInterface
{
    public function __construct(private SendEmailService $emailService)
    {
    }

    public function __invoke(InviteEmailCommand $emailCommand)
    {
        $this->emailService->pass($emailCommand->from);
    }
}
