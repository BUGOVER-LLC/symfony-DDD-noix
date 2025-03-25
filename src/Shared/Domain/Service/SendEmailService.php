<?php

declare(strict_types=1);

namespace App\Shared\Domain\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SendEmailService
{
    private Email $emailInstance;

    private TemplatedEmail $template;

    public function __construct(private readonly Email $mimeEmail, private readonly MailerInterface $mailer)
    {
    }

    public function pass(string $email)
    {
        $this->emailInstance = $this->mimeEmail
            ->from()
            ->to($email);
    }

    public function setTemplate(string $template)
    {
        $this->template = (new TemplatedEmail())->htmlTemplate($template);
    }

    public function send(): void
    {
        $this->mailer->send($this->emailInstance);
    }
}
