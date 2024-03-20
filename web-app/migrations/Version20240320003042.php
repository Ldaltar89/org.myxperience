<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240320003042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', question_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', answer VARCHAR(255) NOT NULL, answer_image VARCHAR(255) DEFAULT NULL, answer_audio VARCHAR(255) DEFAULT NULL, correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_50D0C606A3E60C9C (question_answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examns (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', examns_type_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', season_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, score NUMERIC(5, 2) DEFAULT NULL, score_pass NUMERIC(5, 2) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_D1BE3AFEC3A3B566 (examns_type_id), INDEX IDX_D1BE3AFE4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examns_type (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', examns_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', question VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, question_type VARCHAR(10) NOT NULL, question_image VARCHAR(255) DEFAULT NULL, question_audio VARCHAR(255) DEFAULT NULL, points NUMERIC(5, 2) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_8ADC54D5D06BDBC9 (examns_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, season_year VARCHAR(10) NOT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE university (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, type VARCHAR(100) NOT NULL, location VARCHAR(255) NOT NULL, website VARCHAR(100) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, phone VARCHAR(100) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', season_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', university_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, name VARCHAR(100) DEFAULT NULL, lastname VARCHAR(100) DEFAULT NULL, dni VARCHAR(20) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, birthday DATETIME DEFAULT NULL, user_image VARCHAR(255) DEFAULT NULL, gender VARCHAR(20) DEFAULT NULL, INDEX IDX_8D93D6494EC001D1 (season_id), INDEX IDX_8D93D649309D1878 (university_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answers (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', answer_user_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', user_question_user_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_8DDD80C6219A86 (answer_user_answer_id), INDEX IDX_8DDD80CFB22F94B (user_question_user_answer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_examns (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', _user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', season_user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', examn_user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', is_done TINYINT(1) NOT NULL, is_approved TINYINT(1) NOT NULL, is_canceled TINYINT(1) NOT NULL, score NUMERIC(5, 2) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_B4EC21C38D80B8C5 (_user_examn_id), INDEX IDX_B4EC21C341D20796 (season_user_examn_id), INDEX IDX_B4EC21C366092BAA (examn_user_examn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_questions (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', user_examn_user_question_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', question_user_question_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', points NUMERIC(5, 2) NOT NULL, correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, INDEX IDX_8A3CD93124037C43 (user_examn_user_question_id), INDEX IDX_8A3CD931F227EA35 (question_user_question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C606A3E60C9C FOREIGN KEY (question_answer_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE examns ADD CONSTRAINT FK_D1BE3AFEC3A3B566 FOREIGN KEY (examns_type_id) REFERENCES examns_type (id)');
        $this->addSql('ALTER TABLE examns ADD CONSTRAINT FK_D1BE3AFE4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5D06BDBC9 FOREIGN KEY (examns_id) REFERENCES examns (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649309D1878 FOREIGN KEY (university_id) REFERENCES university (id)');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80C6219A86 FOREIGN KEY (answer_user_answer_id) REFERENCES answers (id)');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80CFB22F94B FOREIGN KEY (user_question_user_answer_id) REFERENCES user_questions (id)');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C38D80B8C5 FOREIGN KEY (_user_examn_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C341D20796 FOREIGN KEY (season_user_examn_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C366092BAA FOREIGN KEY (examn_user_examn_id) REFERENCES examns (id)');
        $this->addSql('ALTER TABLE user_questions ADD CONSTRAINT FK_8A3CD93124037C43 FOREIGN KEY (user_examn_user_question_id) REFERENCES user_examns (id)');
        $this->addSql('ALTER TABLE user_questions ADD CONSTRAINT FK_8A3CD931F227EA35 FOREIGN KEY (question_user_question_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C606A3E60C9C');
        $this->addSql('ALTER TABLE examns DROP FOREIGN KEY FK_D1BE3AFEC3A3B566');
        $this->addSql('ALTER TABLE examns DROP FOREIGN KEY FK_D1BE3AFE4EC001D1');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5D06BDBC9');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494EC001D1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649309D1878');
        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80C6219A86');
        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80CFB22F94B');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C38D80B8C5');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C341D20796');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C366092BAA');
        $this->addSql('ALTER TABLE user_questions DROP FOREIGN KEY FK_8A3CD93124037C43');
        $this->addSql('ALTER TABLE user_questions DROP FOREIGN KEY FK_8A3CD931F227EA35');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE examns');
        $this->addSql('DROP TABLE examns_type');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE university');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_answers');
        $this->addSql('DROP TABLE user_examns');
        $this->addSql('DROP TABLE user_questions');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
