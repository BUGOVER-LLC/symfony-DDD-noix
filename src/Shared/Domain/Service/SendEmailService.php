<?php

declare(strict_types=1);

namespace App\Shared\Domain\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class SendEmailService
{
    private Email $emailInstance;

    private TemplatedEmail $template;

    public function __construct(private readonly MailerInterface $mailer)
    {
    }

    public function pass(string $email)
    {
        $this->emailInstance = (new Email())
            ->from(new Address($email))
            ->to($email)
            ->text('TODO');

        return $this;
    }

    public function setTemplate(string $template)
    {
        $this->template = (new TemplatedEmail())->htmlTemplate($template);

        return $this;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function send(): void
    {
        $this->mailer->send($this->emailInstance);
    }
}
