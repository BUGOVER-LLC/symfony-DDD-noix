<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\Shared\Infrastructure\Attribute\RequestBody;
use App\User\Infrastructure\DTO\InviteUserDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Contracts\Translation\TranslatorInterface;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[IsGranted('invite', 'inviteUser', "Doesn't permission for this action", 423)]
#[Route(path: '/api/v1/invite-user', methods: ['POST'])]
class InviteUserController extends AbstractController
{
    public function __construct(private readonly TranslatorInterface $translator)
    {
    }

    public function __invoke(
        Request $request,
        #[RequestBody] InviteUserDTO $inviteUser,
    ): JsonResponse
    {
        return $this->json(['message' => $this->translator->trans('invitation')]);
    }
}
