<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Mail;

use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\Service\SendEmailService;

readonly class InviteUserCommandHandler implements CommandHandlerInterface
{
    private const string TEMPLATE_PATH = 'email/user-invitation.html.twig';

    public function __construct(
        private SendEmailService $emailService,
    )
    {
    }

    public function __invoke(InviteEmailCommand $emailCommand)
    {
        $this->emailService
            ->pass($emailCommand->from)
            ->setTemplate(self::TEMPLATE_PATH)
            ->send();
    }
}
