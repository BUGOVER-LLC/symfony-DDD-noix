<?php

declare(strict_types=1);

namespace App\Channels\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route(path: '/api/v1/channels', methods: ['GET'])]
class GetChannelsController extends AbstractController
{
    public function __invoke(Security $security)
    {
        // TODO: Implement __invoke() method.
    }
}
