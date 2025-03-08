<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308142826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boards_shared_boards (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6EB136F0E7EC5785 ON boards_shared_boards (board_id)');
        $this->addSql('ALTER TABLE boards_shared_boards ADD CONSTRAINT FK_6EB136F0E7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user ADD current_workspace_id VARCHAR(26) DEFAULT NULL');
        $this->addSql('ALTER TABLE users_user ADD CONSTRAINT FK_421A98477D65B4C4 FOREIGN KEY (current_workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_421A98477D65B4C4 ON users_user (current_workspace_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boards_shared_boards DROP CONSTRAINT FK_6EB136F0E7EC5785');
        $this->addSql('DROP TABLE boards_shared_boards');
        $this->addSql('ALTER TABLE users_user DROP CONSTRAINT FK_421A98477D65B4C4');
        $this->addSql('DROP INDEX IDX_421A98477D65B4C4');
        $this->addSql('ALTER TABLE users_user DROP current_workspace_id');
    }
}
