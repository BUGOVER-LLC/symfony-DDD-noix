<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312053836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_user_invitation (email VARCHAR(191) NOT NULL, token VARCHAR(191) NOT NULL, accepted_at DATE DEFAULT NULL, created_at DATE NOT NULL, id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D4E7927C74 ON users_user_invitation (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D45F37A13B ON users_user_invitation (token)');
        $this->addSql('ALTER TABLE workspaces_workspace ALTER members_count TYPE SMALLINT');
        $this->addSql('ALTER TABLE workspaces_workspace ALTER members_count DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users_user_invitation');
        $this->addSql('ALTER TABLE workspaces_workspace ALTER members_count TYPE SMALLINT');
        $this->addSql('ALTER TABLE workspaces_workspace ALTER members_count SET DEFAULT 0');
    }
}
