<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class HealthCheckActionTest extends WebTestCase
{
    public function test_request_success_response(): void
    {
        $client = static::createClient();
        $client->request(Request::METHOD_GET, '/health-check');

        static::assertResponseIsSuccessful();
    }
}
