<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250316113838 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_workspace ADD plan_id VARCHAR(26) DEFAULT NULL');
        $this->addSql('ALTER TABLE workspaces_workspace ADD CONSTRAINT FK_A539351BE899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A539351BE899029B ON workspaces_workspace (plan_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workspaces_workspace DROP CONSTRAINT FK_A539351BE899029B');
        $this->addSql('DROP INDEX IDX_A539351BE899029B');
        $this->addSql('ALTER TABLE workspaces_workspace DROP plan_id');
    }
}
