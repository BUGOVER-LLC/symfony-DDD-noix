<?php

declare(strict_types=1);

namespace App\User\Application\UseCase\Query\FindInvitationByUser;

use App\Shared\Application\Query\QueryHandlerInterface;
use App\User\Application\DTO\Assembler\UserInvitationAssembler;
use App\User\Domain\Repository\UserInvitationRepositoryInterface;

readonly class FindInvitiationByUserQueryHandler implements QueryHandlerInterface
{
    public function __construct(private UserInvitationRepositoryInterface $invitationRepository)
    {
    }

    public function __invoke(FindInvitiationByUserQuery $invitiationByUserQuery)
    {
        $result = $this->invitationRepository->findInvitationByUserId(
            $invitiationByUserQuery->email,
            $invitiationByUserQuery->workspaceId,
        );
        if (!$result) {
            throw new \RuntimeException();
        }
        $invitationDTO = UserInvitationAssembler::fromEntity($result);

        return new FindInvitiationByUserResult($invitationDTO);
    }
}
