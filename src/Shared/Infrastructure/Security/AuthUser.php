<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Security;

use App\Shared\Domain\Security\AuthUserInterface;
use App\Shared\Domain\Security\UserFetcherInterface;
use Override;
use PHPUnit\Framework\Assert;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Contracts\Translation\TranslatorInterface;

use function get_class;
use function sprintf;

readonly class AuthUser implements UserFetcherInterface
{
    public function __construct(private readonly Security $security, private readonly TranslatorInterface $translator)
    {
    }

    public function getAuthUser(): AuthUserInterface
    {
        $user = $this->security->getUser();

        Assert::assertNotNull($user, $this->translator->trans('unauthenticated'));
        Assert::assertInstanceOf(
            AuthUserInterface::class,
            $user,
            sprintf('invalid user type %s', get_class($user)),
        );

        return $user;
    }

    #[Override] public function requiredUserId(): string
    {
        return $this->requiredUser()->getId();
    }

    #[Override] public function requiredUser(): AuthUserInterface
    {
        /* @var AuthUserInterface|null $user */
        $user = $this->security->getUser();

        if (is_null($user)) {
            throw new AccessDeniedException('Access Denied.');
        }

        Assert::assertInstanceOf(
            get_class($user),
            AuthUserInterface::class,
            sprintf('Invalid user type %s', get_class($user))
        );

        return $user;
    }

    #[Override] public function nullableUser(): ?AuthUserInterface
    {
        return $this->security->getUser();
    }

    #[Override] public function nullableUserId(): ?string
    {
        return $this->requiredUser()->getId();
    }
}
