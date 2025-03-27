<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\Shared\Application\Attribute\RequestBody;
use App\User\Infrastructure\DTO\InviteUserDTO;
use App\User\Infrastructure\InviteUser\InviteUserActionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Contracts\Translation\TranslatorInterface;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[IsGranted('accessInviter', 'inviteUser', "Doesn't permission for this action", 423)]
#[IsGranted('accessInvite', 'inviteUser', "Doesn't permission for this action", 423)]
#[Route(path: '/api/v1/invite-user', methods: ['POST'])]
final class InviteUserController extends AbstractController
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly InviteUserActionInterface $inviteUserAction,
    )
    {
    }

    public function __invoke(
        Request $request,
        #[RequestBody] InviteUserDTO $inviteUser,
    ): JsonResponse
    {
        $this->inviteUserAction->invite($inviteUser);

        return $this->json(
            ['message' => $this->translator->trans('invitation', ['email' => $inviteUser->getEmail()])],
            Response::HTTP_CREATED,
        );
    }
}
