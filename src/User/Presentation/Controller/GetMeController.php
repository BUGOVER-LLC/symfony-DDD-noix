<?php

declare(strict_types=1);

namespace App\User\Presentation\Controller;

use App\User\Domain\Entity\User;
use App\User\Infrastructure\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1/user/me', name: 'auth_user', methods: [Request::METHOD_GET])]
class GetMeController extends AbstractController
{
    public function __invoke(Security $security, UserRepository $userRepository): JsonResponse
    {
        /* @var User $user */
        $user = $security->getUser();

        return $this->json([
            'id' => $user?->getId(),
            'email' => $user?->getEmail(),
        ]);
    }
}
