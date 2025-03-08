<?php

declare(strict_types=1);

namespace App\User\Infrastructure\EventHandler;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

readonly class JWTCreatedEventHandler
{
    public function onJWTCreated(JWTCreatedEvent $event)
    {
    }
}
