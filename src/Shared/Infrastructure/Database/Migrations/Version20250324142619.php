<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250324142619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_worker ADD channel_id VARCHAR(26) DEFAULT NULL');
        $this->addSql('ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F372F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_1065C4F372F5A1AA ON workspaces_worker (channel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F372F5A1AA');
        $this->addSql('DROP INDEX IDX_1065C4F372F5A1AA');
        $this->addSql('ALTER TABLE workspaces_worker DROP channel_id');
    }
}
