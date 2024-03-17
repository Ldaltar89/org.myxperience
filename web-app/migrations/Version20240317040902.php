<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317040902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', answer VARCHAR(255) NOT NULL, question_image VARCHAR(255) DEFAULT NULL, question_audio VARCHAR(255) DEFAULT NULL, correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examns (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, score NUMERIC(5, 2) DEFAULT NULL, score_pass NUMERIC(5, 2) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examns_type (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', question VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, question_type VARCHAR(10) NOT NULL, question_image VARCHAR(255) DEFAULT NULL, question_audio VARCHAR(255) DEFAULT NULL, points NUMERIC(5, 2) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(100) NOT NULL, season_year VARCHAR(10) NOT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE university (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, type VARCHAR(100) NOT NULL, location VARCHAR(255) NOT NULL, website VARCHAR(100) DEFAULT NULL, email VARCHAR(100) DEFAULT NULL, phone VARCHAR(100) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', season_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', university_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, name VARCHAR(100) DEFAULT NULL, lastname VARCHAR(100) DEFAULT NULL, dni VARCHAR(20) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, birthday DATETIME DEFAULT NULL, user_image VARCHAR(255) DEFAULT NULL, gender VARCHAR(20) DEFAULT NULL, INDEX IDX_8D93D6494EC001D1 (season_id), INDEX IDX_8D93D649309D1878 (university_id), UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_answers (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_examns (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', is_done TINYINT(1) NOT NULL, is_approved TINYINT(1) NOT NULL, is_canceled TINYINT(1) NOT NULL, score NUMERIC(5, 2) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_questions (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', points NUMERIC(5, 2) NOT NULL, correct TINYINT(1) NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, created_by VARCHAR(100) NOT NULL, updated_at DATETIME DEFAULT NULL, updated_by VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649309D1878 FOREIGN KEY (university_id) REFERENCES university (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494EC001D1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649309D1878');
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
