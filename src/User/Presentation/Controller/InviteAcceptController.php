<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\Shared\Application\Attribute\RequestBody;
use App\User\Infrastructure\DTO\InviteUserAcceptDTO;
use App\User\Infrastructure\InviteUser\AcceptInviteActionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/auth/v1/accept-invite', name: 'auth_user_accept_invite', requirements: [
    'token' => 'string',
    'email' => 'string',
    'password' => 'string',
],
    methods: ['POST'])]
final class InviteAcceptController extends AbstractController
{
    public function __construct(private readonly AcceptInviteActionInterface $acceptInviteAction)
    {
    }

    public function __invoke(#[RequestBody] InviteUserAcceptDTO $inviteUserAccept)
    {
    }
}
