<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250309114014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_workspace ADD url_path VARCHAR(500) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A539351B150042B7 ON workspaces_workspace (url_path)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_A539351B150042B7');
        $this->addSql('ALTER TABLE workspaces_workspace DROP url_path');
    }
}
