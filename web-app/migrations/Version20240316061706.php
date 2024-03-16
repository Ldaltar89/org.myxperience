<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240316061706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD name VARCHAR(100) DEFAULT NULL, ADD lastname VARCHAR(100) DEFAULT NULL, ADD dni VARCHAR(20) DEFAULT NULL, ADD is_active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL, ADD created_by VARCHAR(100) NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD updated_by VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP name, DROP lastname, DROP dni, DROP is_active, DROP created_at, DROP created_by, DROP updated_at, DROP updated_by');
    }
}
