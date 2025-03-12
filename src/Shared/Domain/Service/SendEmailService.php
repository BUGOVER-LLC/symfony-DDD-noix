<?php

declare(strict_types=1);

namespace App\Shared\Domain\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendEmailService
{
    private Email $emailInstance;

    public function __construct(private readonly Email $email, private readonly MailerInterface $mailer)
    {
    }

    public function pass(string $email)
    {
        $this->emailInstance = $this->email
            ->from()
            ->to($email)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
    }

    public function send(): void
    {
        $this->mailer->send($this->emailInstance);
    }
}
