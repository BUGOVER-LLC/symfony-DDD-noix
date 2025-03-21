<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250321214824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acl_plan (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price NUMERIC(8, 2) NOT NULL, trial BOOLEAN NOT NULL, active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA563A6E5E237E06 ON acl_plan (name)');
        $this->addSql('CREATE TABLE acl_plan_features (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E5A06A025E237E06 ON acl_plan_features (name)');
        $this->addSql('CREATE INDEX IDX_E5A06A02E899029B ON acl_plan_features (plan_id)');
        $this->addSql('CREATE TABLE acl_plan_roles (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B35CAA2EE899029B ON acl_plan_roles (plan_id)');
        $this->addSql('CREATE INDEX IDX_B35CAA2ED60322AC ON acl_plan_roles (role_id)');
        $this->addSql('CREATE TABLE acl_role (key VARCHAR(50) NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7065EB798A90ABA9 ON acl_role (key)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7065EB795E237E06 ON acl_role (name)');
        $this->addSql('CREATE TABLE boards_board (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_766DD09482D40A1F ON boards_board (workspace_id)');
        $this->addSql('CREATE TABLE boards_board_channel (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) DEFAULT NULL, channel_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1440DF9FE7EC5785 ON boards_board_channel (board_id)');
        $this->addSql('CREATE INDEX IDX_1440DF9F72F5A1AA ON boards_board_channel (channel_id)');
        $this->addSql('CREATE TABLE boards_board_steps (name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2828F6DEE7EC5785 ON boards_board_steps (board_id)');
        $this->addSql('CREATE TABLE boards_shared_boards (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6EB136F0E7EC5785 ON boards_shared_boards (board_id)');
        $this->addSql('CREATE TABLE channels_channel (name VARCHAR(250) NOT NULL, total_connected SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C5C46D2482D40A1F ON channels_channel (workspace_id)');
        $this->addSql('CREATE TABLE channels_shared_channel_workspaces (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, shared_channel_id VARCHAR(26) NOT NULL, target_workspace_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_56C4F9F86E64165 ON channels_shared_channel_workspaces (shared_channel_id)');
        $this->addSql('CREATE INDEX IDX_56C4F9F86286D94E ON channels_shared_channel_workspaces (target_workspace_id)');
        $this->addSql('CREATE TABLE channels_shared_channels (name VARCHAR(190) NOT NULL, description VARCHAR(500) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_59EAB76972F5A1AA ON channels_shared_channels (channel_id)');
        $this->addSql('CREATE TABLE messages_message (body JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) DEFAULT NULL, author_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AF1664A472F5A1AA ON messages_message (channel_id)');
        $this->addSql('CREATE INDEX IDX_AF1664A4F675F31B ON messages_message (author_id)');
        $this->addSql('CREATE TABLE messages_message_reaction (reaction VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, reactor_id VARCHAR(26) DEFAULT NULL, message_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8BBA35F9723AD41B ON messages_message_reaction (reactor_id)');
        $this->addSql('CREATE INDEX IDX_8BBA35F9537A1329 ON messages_message_reaction (message_id)');
        $this->addSql('CREATE TABLE users_refresh_token (refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, scopes JSON DEFAULT \'[]\', created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CEAA2998C74F2195 ON users_refresh_token (refresh_token)');
        $this->addSql('CREATE TABLE users_user (email VARCHAR(191) NOT NULL, phone VARCHAR(19) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, current_workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_421A9847E7927C74 ON users_user (email)');
        $this->addSql('CREATE INDEX IDX_421A98477D65B4C4 ON users_user (current_workspace_id)');
        $this->addSql('CREATE TABLE users_user_invitation (email VARCHAR(191) NOT NULL, token VARCHAR(191) NOT NULL, accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id VARCHAR(26) NOT NULL, role_id VARCHAR(26) DEFAULT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D4E7927C74 ON users_user_invitation (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D45F37A13B ON users_user_invitation (token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ED0F58D4D60322AC ON users_user_invitation (role_id)');
        $this->addSql('CREATE INDEX IDX_ED0F58D482D40A1F ON users_user_invitation (workspace_id)');
        $this->addSql('CREATE TABLE users_user_profiles (full_name VARCHAR(190) NOT NULL, photo VARCHAR(255) DEFAULT NULL, timezone TIMESTAMP(0) WITH TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, user_id VARCHAR(26) DEFAULT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6258693DA76ED395 ON users_user_profiles (user_id)');
        $this->addSql('CREATE INDEX IDX_6258693D82D40A1F ON users_user_profiles (workspace_id)');
        $this->addSql('CREATE TABLE workspaces_worker (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, user_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1065C4F382D40A1F ON workspaces_worker (workspace_id)');
        $this->addSql('CREATE INDEX IDX_1065C4F3A76ED395 ON workspaces_worker (user_id)');
        $this->addSql('CREATE INDEX IDX_1065C4F3D60322AC ON workspaces_worker (role_id)');
        $this->addSql('CREATE TABLE workspaces_workspace (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, url_path VARCHAR(500) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A539351B5E237E06 ON workspaces_workspace (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A539351B150042B7 ON workspaces_workspace (url_path)');
        $this->addSql('CREATE INDEX IDX_A539351BE899029B ON workspaces_workspace (plan_id)');
        $this->addSql('CREATE TABLE workspaces_workspace_role (workspace_id VARCHAR(26) NOT NULL, role_id VARCHAR(26) NOT NULL, PRIMARY KEY(workspace_id, role_id))');
        $this->addSql('CREATE INDEX IDX_2243C2C282D40A1F ON workspaces_workspace_role (workspace_id)');
        $this->addSql('CREATE INDEX IDX_2243C2C2D60322AC ON workspaces_workspace_role (role_id)');
        $this->addSql('ALTER TABLE acl_plan_features ADD CONSTRAINT FK_E5A06A02E899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE acl_plan_roles ADD CONSTRAINT FK_B35CAA2EE899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE acl_plan_roles ADD CONSTRAINT FK_B35CAA2ED60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE boards_board ADD CONSTRAINT FK_766DD09482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE boards_board_channel ADD CONSTRAINT FK_1440DF9FE7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE boards_board_channel ADD CONSTRAINT FK_1440DF9F72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE boards_board_steps ADD CONSTRAINT FK_2828F6DEE7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE boards_shared_boards ADD CONSTRAINT FK_6EB136F0E7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels_channel ADD CONSTRAINT FK_C5C46D2482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels_shared_channel_workspaces ADD CONSTRAINT FK_56C4F9F86E64165 FOREIGN KEY (shared_channel_id) REFERENCES channels_shared_channels (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels_shared_channel_workspaces ADD CONSTRAINT FK_56C4F9F86286D94E FOREIGN KEY (target_workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels_shared_channels ADD CONSTRAINT FK_59EAB76972F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A472F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A4F675F31B FOREIGN KEY (author_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9723AD41B FOREIGN KEY (reactor_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9537A1329 FOREIGN KEY (message_id) REFERENCES messages_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user ADD CONSTRAINT FK_421A98477D65B4C4 FOREIGN KEY (current_workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D4D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user_profiles ADD CONSTRAINT FK_6258693DA76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_user_profiles ADD CONSTRAINT FK_6258693D82D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F382D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F3A76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F3D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_workspace ADD CONSTRAINT FK_A539351BE899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_workspace_role ADD CONSTRAINT FK_2243C2C282D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE workspaces_workspace_role ADD CONSTRAINT FK_2243C2C2D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acl_plan_features DROP CONSTRAINT FK_E5A06A02E899029B');
        $this->addSql('ALTER TABLE acl_plan_roles DROP CONSTRAINT FK_B35CAA2EE899029B');
        $this->addSql('ALTER TABLE acl_plan_roles DROP CONSTRAINT FK_B35CAA2ED60322AC');
        $this->addSql('ALTER TABLE boards_board DROP CONSTRAINT FK_766DD09482D40A1F');
        $this->addSql('ALTER TABLE boards_board_channel DROP CONSTRAINT FK_1440DF9FE7EC5785');
        $this->addSql('ALTER TABLE boards_board_channel DROP CONSTRAINT FK_1440DF9F72F5A1AA');
        $this->addSql('ALTER TABLE boards_board_steps DROP CONSTRAINT FK_2828F6DEE7EC5785');
        $this->addSql('ALTER TABLE boards_shared_boards DROP CONSTRAINT FK_6EB136F0E7EC5785');
        $this->addSql('ALTER TABLE channels_channel DROP CONSTRAINT FK_C5C46D2482D40A1F');
        $this->addSql('ALTER TABLE channels_shared_channel_workspaces DROP CONSTRAINT FK_56C4F9F86E64165');
        $this->addSql('ALTER TABLE channels_shared_channel_workspaces DROP CONSTRAINT FK_56C4F9F86286D94E');
        $this->addSql('ALTER TABLE channels_shared_channels DROP CONSTRAINT FK_59EAB76972F5A1AA');
        $this->addSql('ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A472F5A1AA');
        $this->addSql('ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A4F675F31B');
        $this->addSql('ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9723AD41B');
        $this->addSql('ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9537A1329');
        $this->addSql('ALTER TABLE users_user DROP CONSTRAINT FK_421A98477D65B4C4');
        $this->addSql('ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D4D60322AC');
        $this->addSql('ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D482D40A1F');
        $this->addSql('ALTER TABLE users_user_profiles DROP CONSTRAINT FK_6258693DA76ED395');
        $this->addSql('ALTER TABLE users_user_profiles DROP CONSTRAINT FK_6258693D82D40A1F');
        $this->addSql('ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F382D40A1F');
        $this->addSql('ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F3A76ED395');
        $this->addSql('ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F3D60322AC');
        $this->addSql('ALTER TABLE workspaces_workspace DROP CONSTRAINT FK_A539351BE899029B');
        $this->addSql('ALTER TABLE workspaces_workspace_role DROP CONSTRAINT FK_2243C2C282D40A1F');
        $this->addSql('ALTER TABLE workspaces_workspace_role DROP CONSTRAINT FK_2243C2C2D60322AC');
        $this->addSql('DROP TABLE acl_plan');
        $this->addSql('DROP TABLE acl_plan_features');
        $this->addSql('DROP TABLE acl_plan_roles');
        $this->addSql('DROP TABLE acl_role');
        $this->addSql('DROP TABLE boards_board');
        $this->addSql('DROP TABLE boards_board_channel');
        $this->addSql('DROP TABLE boards_board_steps');
        $this->addSql('DROP TABLE boards_shared_boards');
        $this->addSql('DROP TABLE channels_channel');
        $this->addSql('DROP TABLE channels_shared_channel_workspaces');
        $this->addSql('DROP TABLE channels_shared_channels');
        $this->addSql('DROP TABLE messages_message');
        $this->addSql('DROP TABLE messages_message_reaction');
        $this->addSql('DROP TABLE users_refresh_token');
        $this->addSql('DROP TABLE users_user');
        $this->addSql('DROP TABLE users_user_invitation');
        $this->addSql('DROP TABLE users_user_profiles');
        $this->addSql('DROP TABLE workspaces_worker');
        $this->addSql('DROP TABLE workspaces_workspace');
        $this->addSql('DROP TABLE workspaces_workspace_role');
    }
}
