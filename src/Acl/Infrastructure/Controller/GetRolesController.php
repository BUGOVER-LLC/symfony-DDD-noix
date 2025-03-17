<?php

declare(strict_types=1);

namespace App\Acl\Infrastructure\Controller;

use Monolog\Attribute\WithMonologChannel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/roles', methods: ['GET', 'HEAD'])]
#[WithMonologChannel('app')]
class GetRolesController extends AbstractController
{
    public function __invoke()
    {
        return $this->json([]);
    }
}
