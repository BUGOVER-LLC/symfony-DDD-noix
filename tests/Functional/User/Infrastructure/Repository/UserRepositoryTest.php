<?php

declare(strict_types=1);

namespace App\Tests\Functional\User\Infrastructure\Repository;

use App\Tests\Resource\Tools\FixtureTool;
use App\User\Domain\Factory\UserFactory;
use App\User\Infrastructure\Repository\UserRepository;
use Faker\Factory;
use Faker\Generator;
use Liip\TestFixturesBundle\Services\DatabaseToolCollection;
use Liip\TestFixturesBundle\Services\DatabaseTools\ORMDatabaseTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserRepositoryTest extends WebTestCase
{
    use FixtureTool;

    private UserRepository $userRepository;

    private Generator $faker;

    private ORMDatabaseTool $databaseTool;

    private UserFactory $userFactory;

    public function test_user_added_success(): void
    {
        $user = $this->userFactory->create($this->faker->email(), $this->faker->password());
        $this->userRepository->add($user);
        $existsUser = $this->userRepository->findByUlid($user->getId());

        // Asserts
        self::assertEquals($user->getId(), $existsUser->getId());
    }

    public function test_user_find_successfuly(): void
    {
        $user = $this->loadUserFixture();

        $existUser = $this->userRepository->findByUlid($user->getUlid());

        self::assertEquals($user->getUlid(), $existUser->getId());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = static::getContainer()->get(UserRepository::class);
        $this->databaseTool = static::getContainer()->get(DatabaseToolCollection::class)->get();
        $this->userFactory = self::getContainer()->get(UserFactory::class);
        $this->faker = Factory::create();
    }
}
