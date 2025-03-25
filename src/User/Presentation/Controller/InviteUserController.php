<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\User\Domain\Service\InviteUserActionInterface;
use App\User\Infrastructure\DTO\InviteUserDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Contracts\Translation\TranslatorInterface;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[IsGranted('invite', 'inviteUser', "Doesn't permission for this action", 423)]
#[Route(path: '/api/v1/invite-user', methods: ['POST'])]
class InviteUserController extends AbstractController
{
    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly InviteUserActionInterface $inviteUserAction
    )
    {
    }

    public function __invoke(
        Request $request,
        #[MapRequestPayload] InviteUserDTO $inviteUser,
    ): JsonResponse
    {
        $this->inviteUserAction->invite($inviteUser);

        return $this->json(['message' => $this->translator->trans('invitation')]);
    }
}
