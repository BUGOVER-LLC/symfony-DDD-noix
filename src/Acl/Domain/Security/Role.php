<?php

declare(strict_types=1);

namespace App\Acl\Domain\Security;

/**
 * Global roles
 */
final readonly class Role
{
    public const string ROLE_WORKSPACE_OWNER = 'WORKSPACE_OWNER';

    public const string ROLE_WORKSPACE_ADMIN = 'WORKSPACE_ADMIN';

    public const string ROLE_WORKSPACE_FULL_MEMBER = 'WORKSPACE_FULL_MEMBER';

    public const string ROLE_WORKSPACE_MEMBER = 'WORKSPACE_MEMBER';

    public const string ROLE_CHANNEL_MANAGER = 'CHANNEL_MANAGER';

    public const string ROLE_CHANNEL_GUEST = 'CHANNEL_GUEST';

    public const string ROLE_INVITED_MEMBER = 'INVITED_MEMBER';

    public const array ROLES = [
        self::ROLE_WORKSPACE_OWNER,
        self::ROLE_WORKSPACE_ADMIN,
        self::ROLE_WORKSPACE_FULL_MEMBER,
        self::ROLE_WORKSPACE_MEMBER,
        self::ROLE_CHANNEL_MANAGER,
        self::ROLE_CHANNEL_GUEST,
        self::ROLE_INVITED_MEMBER,
    ];
}
