<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250405174701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE acl_plan (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, price NUMERIC(8, 2) NOT NULL, trial BOOLEAN NOT NULL, active BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_FA563A6E5E237E06 ON acl_plan (name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE acl_plan_features (name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_E5A06A025E237E06 ON acl_plan_features (name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_E5A06A02E899029B ON acl_plan_features (plan_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE acl_plan_roles (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B35CAA2EE899029B ON acl_plan_roles (plan_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_B35CAA2ED60322AC ON acl_plan_roles (role_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE acl_role (key VARCHAR(50) NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_7065EB798A90ABA9 ON acl_role (key)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_7065EB795E237E06 ON acl_role (name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boards_board (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_766DD09482D40A1F ON boards_board (workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boards_board_channel (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) DEFAULT NULL, channel_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1440DF9FE7EC5785 ON boards_board_channel (board_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1440DF9F72F5A1AA ON boards_board_channel (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boards_board_steps (name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2828F6DEE7EC5785 ON boards_board_steps (board_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE boards_shared_boards (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, board_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6EB136F0E7EC5785 ON boards_shared_boards (board_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE channels_channel (name VARCHAR(250) NOT NULL, total_connected SMALLINT NOT NULL, members_count SMALLINT DEFAULT 0 NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_C5C46D2482D40A1F ON channels_channel (workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE channels_channel_member (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) DEFAULT NULL, user_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5B494CDF72F5A1AA ON channels_channel_member (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_5B494CDFA76ED395 ON channels_channel_member (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE channels_shared_channel_workspaces (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, shared_channel_id VARCHAR(26) NOT NULL, target_workspace_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_56C4F9F86E64165 ON channels_shared_channel_workspaces (shared_channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_56C4F9F86286D94E ON channels_shared_channel_workspaces (target_workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE channels_shared_channels (name VARCHAR(190) NOT NULL, description VARCHAR(500) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_59EAB76972F5A1AA ON channels_shared_channels (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messages_message (body JSON NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, channel_id VARCHAR(26) DEFAULT NULL, author_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_AF1664A472F5A1AA ON messages_message (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_AF1664A4F675F31B ON messages_message (author_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messages_message_reaction (reaction VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, reactor_id VARCHAR(26) DEFAULT NULL, message_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_8BBA35F9723AD41B ON messages_message_reaction (reactor_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_8BBA35F9537A1329 ON messages_message_reaction (message_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users_refresh_token (refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, scopes JSON DEFAULT '[]', created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_CEAA2998C74F2195 ON users_refresh_token (refresh_token)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users_user (email VARCHAR(191) NOT NULL, phone VARCHAR(19) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, current_workspace_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_421A9847E7927C74 ON users_user (email)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_421A98477D65B4C4 ON users_user (current_workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users_user_invitation (email VARCHAR(191) NOT NULL, token VARCHAR(191) NOT NULL, accepted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id VARCHAR(26) NOT NULL, role_id VARCHAR(26) DEFAULT NULL, workspace_id VARCHAR(26) DEFAULT NULL, channel_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_ED0F58D45F37A13B ON users_user_invitation (token)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_ED0F58D4D60322AC ON users_user_invitation (role_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED0F58D482D40A1F ON users_user_invitation (workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED0F58D472F5A1AA ON users_user_invitation (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users_user_profiles (full_name VARCHAR(190) NOT NULL, photo VARCHAR(255) DEFAULT NULL, timezone TIMESTAMP(0) WITH TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, user_id VARCHAR(26) DEFAULT NULL, workspace_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6258693DA76ED395 ON users_user_profiles (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6258693D82D40A1F ON users_user_profiles (workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_6258693DD60322AC ON users_user_profiles (role_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workspaces_worker (created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id VARCHAR(26) NOT NULL, workspace_id VARCHAR(26) DEFAULT NULL, user_id VARCHAR(26) DEFAULT NULL, channel_id VARCHAR(26) DEFAULT NULL, role_id VARCHAR(26) DEFAULT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1065C4F382D40A1F ON workspaces_worker (workspace_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1065C4F3A76ED395 ON workspaces_worker (user_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1065C4F372F5A1AA ON workspaces_worker (channel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_1065C4F3D60322AC ON workspaces_worker (role_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE workspaces_workspace (name VARCHAR(300) NOT NULL, members_count SMALLINT NOT NULL, url_path VARCHAR(500) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, id VARCHAR(26) NOT NULL, plan_id VARCHAR(26) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A539351B5E237E06 ON workspaces_workspace (name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_A539351B150042B7 ON workspaces_workspace (url_path)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A539351BE899029B ON workspaces_workspace (plan_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_features ADD CONSTRAINT FK_E5A06A02E899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_roles ADD CONSTRAINT FK_B35CAA2EE899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_roles ADD CONSTRAINT FK_B35CAA2ED60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board ADD CONSTRAINT FK_766DD09482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_channel ADD CONSTRAINT FK_1440DF9FE7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_channel ADD CONSTRAINT FK_1440DF9F72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_steps ADD CONSTRAINT FK_2828F6DEE7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_shared_boards ADD CONSTRAINT FK_6EB136F0E7EC5785 FOREIGN KEY (board_id) REFERENCES boards_board (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel ADD CONSTRAINT FK_C5C46D2482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel_member ADD CONSTRAINT FK_5B494CDF72F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel_member ADD CONSTRAINT FK_5B494CDFA76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channel_workspaces ADD CONSTRAINT FK_56C4F9F86E64165 FOREIGN KEY (shared_channel_id) REFERENCES channels_shared_channels (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channel_workspaces ADD CONSTRAINT FK_56C4F9F86286D94E FOREIGN KEY (target_workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channels ADD CONSTRAINT FK_59EAB76972F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A472F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message ADD CONSTRAINT FK_AF1664A4F675F31B FOREIGN KEY (author_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9723AD41B FOREIGN KEY (reactor_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message_reaction ADD CONSTRAINT FK_8BBA35F9537A1329 FOREIGN KEY (message_id) REFERENCES messages_message (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user ADD CONSTRAINT FK_421A98477D65B4C4 FOREIGN KEY (current_workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D4D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D482D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation ADD CONSTRAINT FK_ED0F58D472F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles ADD CONSTRAINT FK_6258693DA76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles ADD CONSTRAINT FK_6258693D82D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles ADD CONSTRAINT FK_6258693DD60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F382D40A1F FOREIGN KEY (workspace_id) REFERENCES workspaces_workspace (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F3A76ED395 FOREIGN KEY (user_id) REFERENCES users_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F372F5A1AA FOREIGN KEY (channel_id) REFERENCES channels_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker ADD CONSTRAINT FK_1065C4F3D60322AC FOREIGN KEY (role_id) REFERENCES acl_role (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_workspace ADD CONSTRAINT FK_A539351BE899029B FOREIGN KEY (plan_id) REFERENCES acl_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_features DROP CONSTRAINT FK_E5A06A02E899029B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_roles DROP CONSTRAINT FK_B35CAA2EE899029B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE acl_plan_roles DROP CONSTRAINT FK_B35CAA2ED60322AC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board DROP CONSTRAINT FK_766DD09482D40A1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_channel DROP CONSTRAINT FK_1440DF9FE7EC5785
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_channel DROP CONSTRAINT FK_1440DF9F72F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_board_steps DROP CONSTRAINT FK_2828F6DEE7EC5785
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE boards_shared_boards DROP CONSTRAINT FK_6EB136F0E7EC5785
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel DROP CONSTRAINT FK_C5C46D2482D40A1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel_member DROP CONSTRAINT FK_5B494CDF72F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_channel_member DROP CONSTRAINT FK_5B494CDFA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channel_workspaces DROP CONSTRAINT FK_56C4F9F86E64165
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channel_workspaces DROP CONSTRAINT FK_56C4F9F86286D94E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE channels_shared_channels DROP CONSTRAINT FK_59EAB76972F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A472F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message DROP CONSTRAINT FK_AF1664A4F675F31B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9723AD41B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages_message_reaction DROP CONSTRAINT FK_8BBA35F9537A1329
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user DROP CONSTRAINT FK_421A98477D65B4C4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D4D60322AC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D482D40A1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_invitation DROP CONSTRAINT FK_ED0F58D472F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles DROP CONSTRAINT FK_6258693DA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles DROP CONSTRAINT FK_6258693D82D40A1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users_user_profiles DROP CONSTRAINT FK_6258693DD60322AC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F382D40A1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F3A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F372F5A1AA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_worker DROP CONSTRAINT FK_1065C4F3D60322AC
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workspaces_workspace DROP CONSTRAINT FK_A539351BE899029B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acl_plan
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acl_plan_features
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acl_plan_roles
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE acl_role
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boards_board
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boards_board_channel
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boards_board_steps
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE boards_shared_boards
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE channels_channel
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE channels_channel_member
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE channels_shared_channel_workspaces
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE channels_shared_channels
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messages_message
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messages_message_reaction
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users_refresh_token
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users_user
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users_user_invitation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users_user_profiles
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workspaces_worker
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE workspaces_workspace
        SQL);
    }
}
