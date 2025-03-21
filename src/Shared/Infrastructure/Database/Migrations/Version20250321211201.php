<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250321211201 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE workspaces_workspace_role (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2243C2C282D40A1F ON workspaces_workspace_role (workspace_id)');
        $this->addSql('CREATE INDEX IDX_2243C2C2D60322AC ON workspaces_workspace_role (role_id)');
        $this->addSql('ALTER TABLE workspaces_workspace_role ADD CONSTRAINT FK_2243C2C282D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_workspace_role ADD CONSTRAINT FK_2243C2C2D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_workspace_role DROP CONSTRAINT FK_2243C2C282D40A1F');
        $this->addSql('ALTER TABLE workspaces_workspace_role DROP CONSTRAINT FK_2243C2C2D60322AC');
        $this->addSql('DROP TABLE workspaces_workspace_role');
    }
}
