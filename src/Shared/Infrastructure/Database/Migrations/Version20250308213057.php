<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250308213057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messages_message (body JSON NOT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) DEFAULT NULL, author_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AF1664A472F5A1AA ON messages_message (channel_id)');
        $this->addSql('CREATE INDEX IDX_AF1664A4F675F31B ON messages_message (author_id)');
        $this->addSql('CREATE TABLE messages_message_reaction (reaction VARCHAR(50) NOT NULL, id VARCHAR(26) NOT NULL, reactor_id VARCHAR(26) DEFAULT NULL, message_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8BBA35F9723AD41B ON messages_message_reaction (reactor_id)');
        $this->addSql('CREATE INDEX IDX_8BBA35F9537A1329 ON messages_message_reaction (message_id)');
        $this->addSql('ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A472F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A4F675F31B FOREIGN KEY (author_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9723AD41B FOREIGN KEY (reactor_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9537A1329 FOREIGN KEY (message_id) REFERENCES messages_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A472F5A1AA');
        $this->addSql('ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A4F675F31B');
        $this->addSql('ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9723AD41B');
        $this->addSql('ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9537A1329');
        $this->addSql('DROP TABLE messages_message');
        $this->addSql('DROP TABLE messages_message_reaction');
    }
}
