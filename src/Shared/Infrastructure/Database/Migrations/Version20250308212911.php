<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308212911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boards_board_steps (name VARCHAR(255) NOT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2828F6DEE7EC5785 ON boards_board_steps (board_id)');
        $this->addSql('ALTER TABLE boards_board_steps ADD CONSTRAINT FK_2828F6DEE7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boards_board_steps DROP CONSTRAINT FK_2828F6DEE7EC5785');
        $this->addSql('DROP TABLE boards_board_steps');
    }
}
