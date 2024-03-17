<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317050020 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers ADD question_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C606A3E60C9C FOREIGN KEY (question_answer_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_50D0C606A3E60C9C ON answers (question_answer_id)');
        $this->addSql('ALTER TABLE examns ADD examns_type_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ADD season_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE examns ADD CONSTRAINT FK_D1BE3AFEC3A3B566 FOREIGN KEY (examns_type_id) REFERENCES examns_type (id)');
        $this->addSql('ALTER TABLE examns ADD CONSTRAINT FK_D1BE3AFE4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('CREATE INDEX IDX_D1BE3AFEC3A3B566 ON examns (examns_type_id)');
        $this->addSql('CREATE INDEX IDX_D1BE3AFE4EC001D1 ON examns (season_id)');
        $this->addSql('ALTER TABLE questions ADD examns_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5D06BDBC9 FOREIGN KEY (examns_id) REFERENCES examns (id)');
        $this->addSql('CREATE INDEX IDX_8ADC54D5D06BDBC9 ON questions (examns_id)');
        $this->addSql('ALTER TABLE user_answers ADD answer_user_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ADD user_question_user_answer_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80C6219A86 FOREIGN KEY (answer_user_answer_id) REFERENCES answers (id)');
        $this->addSql('ALTER TABLE user_answers ADD CONSTRAINT FK_8DDD80CFB22F94B FOREIGN KEY (user_question_user_answer_id) REFERENCES user_questions (id)');
        $this->addSql('CREATE INDEX IDX_8DDD80C6219A86 ON user_answers (answer_user_answer_id)');
        $this->addSql('CREATE INDEX IDX_8DDD80CFB22F94B ON user_answers (user_question_user_answer_id)');
        $this->addSql('ALTER TABLE user_examns ADD _user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ADD season_user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ADD examn_user_examn_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C38D80B8C5 FOREIGN KEY (_user_examn_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C341D20796 FOREIGN KEY (season_user_examn_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE user_examns ADD CONSTRAINT FK_B4EC21C366092BAA FOREIGN KEY (examn_user_examn_id) REFERENCES examns (id)');
        $this->addSql('CREATE INDEX IDX_B4EC21C38D80B8C5 ON user_examns (_user_examn_id)');
        $this->addSql('CREATE INDEX IDX_B4EC21C341D20796 ON user_examns (season_user_examn_id)');
        $this->addSql('CREATE INDEX IDX_B4EC21C366092BAA ON user_examns (examn_user_examn_id)');
        $this->addSql('ALTER TABLE user_questions ADD user_examn_user_question_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', ADD question_user_question_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE user_questions ADD CONSTRAINT FK_8A3CD93124037C43 FOREIGN KEY (user_examn_user_question_id) REFERENCES user_examns (id)');
        $this->addSql('ALTER TABLE user_questions ADD CONSTRAINT FK_8A3CD931F227EA35 FOREIGN KEY (question_user_question_id) REFERENCES questions (id)');
        $this->addSql('CREATE INDEX IDX_8A3CD93124037C43 ON user_questions (user_examn_user_question_id)');
        $this->addSql('CREATE INDEX IDX_8A3CD931F227EA35 ON user_questions (question_user_question_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers DROP FOREIGN KEY FK_50D0C606A3E60C9C');
        $this->addSql('DROP INDEX IDX_50D0C606A3E60C9C ON answers');
        $this->addSql('ALTER TABLE answers DROP question_answer_id');
        $this->addSql('ALTER TABLE examns DROP FOREIGN KEY FK_D1BE3AFEC3A3B566');
        $this->addSql('ALTER TABLE examns DROP FOREIGN KEY FK_D1BE3AFE4EC001D1');
        $this->addSql('DROP INDEX IDX_D1BE3AFEC3A3B566 ON examns');
        $this->addSql('DROP INDEX IDX_D1BE3AFE4EC001D1 ON examns');
        $this->addSql('ALTER TABLE examns DROP examns_type_id, DROP season_id');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5D06BDBC9');
        $this->addSql('DROP INDEX IDX_8ADC54D5D06BDBC9 ON questions');
        $this->addSql('ALTER TABLE questions DROP examns_id');
        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80C6219A86');
        $this->addSql('ALTER TABLE user_answers DROP FOREIGN KEY FK_8DDD80CFB22F94B');
        $this->addSql('DROP INDEX IDX_8DDD80C6219A86 ON user_answers');
        $this->addSql('DROP INDEX IDX_8DDD80CFB22F94B ON user_answers');
        $this->addSql('ALTER TABLE user_answers DROP answer_user_answer_id, DROP user_question_user_answer_id');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C38D80B8C5');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C341D20796');
        $this->addSql('ALTER TABLE user_examns DROP FOREIGN KEY FK_B4EC21C366092BAA');
        $this->addSql('DROP INDEX IDX_B4EC21C38D80B8C5 ON user_examns');
        $this->addSql('DROP INDEX IDX_B4EC21C341D20796 ON user_examns');
        $this->addSql('DROP INDEX IDX_B4EC21C366092BAA ON user_examns');
        $this->addSql('ALTER TABLE user_examns DROP _user_examn_id, DROP season_user_examn_id, DROP examn_user_examn_id');
        $this->addSql('ALTER TABLE user_questions DROP FOREIGN KEY FK_8A3CD93124037C43');
        $this->addSql('ALTER TABLE user_questions DROP FOREIGN KEY FK_8A3CD931F227EA35');
        $this->addSql('DROP INDEX IDX_8A3CD93124037C43 ON user_questions');
        $this->addSql('DROP INDEX IDX_8A3CD931F227EA35 ON user_questions');
        $this->addSql('ALTER TABLE user_questions DROP user_examn_user_question_id, DROP question_user_question_id');
    }
}
