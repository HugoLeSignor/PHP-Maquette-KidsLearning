<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260114081348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, duration_minutes INT NOT NULL, subject_id INT DEFAULT NULL, INDEX IDX_169E6FB923EDC87 (subject_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE resource (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, url VARCHAR(255) DEFAULT NULL, course_id INT NOT NULL, INDEX IDX_BC91F416591CC992 (course_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB923EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id)');
        $this->addSql('ALTER TABLE resource ADD CONSTRAINT FK_BC91F416591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB923EDC87');
        $this->addSql('ALTER TABLE resource DROP FOREIGN KEY FK_BC91F416591CC992');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE subject');
    }
}
