<?php

declare(strict_types=1);

namespace App\Workspaces\Presentation\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted(attribute: 'IS_AUTHENTICATED_FULLY', statusCode: 401)]
#[Route(path: '/api/v1/workspaces', methods: ['GET'])]
class GetWorkspacesController extends AbstractController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}
