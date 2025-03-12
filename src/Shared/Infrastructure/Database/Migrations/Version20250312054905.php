<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250312054905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_user_invitation ADD role_id VARCHAR(26) DEFAULT NULL');
        $this->addSql('ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D4D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D4D60322AC ON users_user_invitation (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D4D60322AC');
        $this->addSql('DROP INDEX UNIQ_ED0F58D4D60322AC');
        $this->addSql('ALTER TABLE users_user_invitation DROP role_id');
    }
}
