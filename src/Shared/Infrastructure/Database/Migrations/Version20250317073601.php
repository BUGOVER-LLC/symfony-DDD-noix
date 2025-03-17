<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317073601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acl_plan_features DROP CONSTRAINT FK_E5A06A02E899029B');
        $this->addSql('ALTER TABLE acl_plan_features ADD CONSTRAINT FK_E5A06A02E899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acl_plan_features DROP CONSTRAINT fk_e5a06a02e899029b');
        $this->addSql('ALTER TABLE acl_plan_features ADD CONSTRAINT fk_e5a06a02e899029b FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
