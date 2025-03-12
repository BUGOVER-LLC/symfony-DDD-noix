<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312103532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_user_invitation ADD workspace_id VARCHAR(26) DEFAULT NULL');
        $this->addSql('ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_ED0F58D482D40A1F ON users_user_invitation (workspace_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D482D40A1F');
        $this->addSql('DROP INDEX IDX_ED0F58D482D40A1F');
        $this->addSql('ALTER TABLE users_user_invitation DROP workspace_id');
    }
}
