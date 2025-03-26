<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250326225913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE channels_channel_member (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) DEFAULT NULL, member_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5B494CDF72F5A1AA ON channels_channel_member (channel_id)');
        $this->addSql('CREATE INDEX IDX_5B494CDF7597D3FE ON channels_channel_member (member_id)');
        $this->addSql('ALTER TABLE channels_channel_member ADD CONSTRAINT FK_5B494CDF72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels_channel_member ADD CONSTRAINT FK_5B494CDF7597D3FE FOREIGN KEY (member_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE channels_channel_member DROP CONSTRAINT FK_5B494CDF72F5A1AA');
        $this->addSql('ALTER TABLE channels_channel_member DROP CONSTRAINT FK_5B494CDF7597D3FE');
        $this->addSql('DROP TABLE channels_channel_member');
    }
}
