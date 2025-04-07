<?php

declare(strict_types=1);

namespace App\Oauth\Domain\Security;

use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

final class GoogleAuthenticator extends OAuth2Authenticator implements AuthenticationEntryPointInterface
{
    public function __construct(
        private readonly ClientRegistry $clientRegistry,
        private readonly EntityManagerInterface $em,
        private readonly RouterInterface $router,
        private readonly UserRepositoryInterface $userRepository
    )
    {
    }

    public function start(Request $request, ?AuthenticationException $authException = null): Response
    {
        return new RedirectResponse($this->router->generate('google_auth_start'), Response::HTTP_TEMPORARY_REDIRECT);
    }

    public function supports(Request $request): ?bool
    {
        return 'google_connect_login' === $request->attributes->get('_route');
    }

    public function authenticate(Request $request): Passport
    {
        $client = $this->clientRegistry->getClient('google');
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function () use ($accessToken, $client) {
                $googleUser = $client->fetchUserFromToken($accessToken);

                $user = $this->userRepository->findOneBy(['googleId' => $googleUser->getId()]);

                if (null === $user) {
                    $user = new User();
                    $user->setGoogleId($googleUser->getId());

                    $this->em->persist($user);
                }

                $this->em->flush();

                return $user;
            })
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // TODO: Implement onAuthenticationSuccess() method.
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        dd($request->getContent());
    }
}
