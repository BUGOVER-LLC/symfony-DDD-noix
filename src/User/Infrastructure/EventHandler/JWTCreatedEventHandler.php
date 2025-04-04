<?php

declare(strict_types=1);

namespace App\User\Infrastructure\EventHandler;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Bundle\SecurityBundle\Security;

readonly class JWTCreatedEventHandler
{
    public function onJWTCreated(JWTCreatedEvent $event)
    {
    }
}
