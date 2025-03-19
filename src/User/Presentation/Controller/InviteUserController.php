<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\Shared\Infrastructure\Attribute\RequestBody;
use App\User\Infrastructure\DTO\InviteUserDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/invite-user', methods: ['POST'])]
class InviteUserController extends AbstractController
{
    public function __construct(private readonly Security $security)
    {
    }

    public function __invoke(#[RequestBody] InviteUserDTO $userDTO)
    {

    }
}
