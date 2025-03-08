<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308125942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boards_board (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_766DD09482D40A1F ON boards_board (workspace_id)');
        $this->addSql('ALTER TABLE boards_board ADD CONSTRAINT FK_766DD09482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boards_board DROP CONSTRAINT FK_766DD09482D40A1F');
        $this->addSql('DROP TABLE boards_board');
    }
}
