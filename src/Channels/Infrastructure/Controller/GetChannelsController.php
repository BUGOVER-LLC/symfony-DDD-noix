<?php

declare(strict_types=1);

namespace App\Channels\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
class GetChannelsController extends AbstractController
{
    #[Route(path: '/api/v1/channels')]
    public function __invoke()
    {

    }
}
