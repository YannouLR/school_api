<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220407142845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE note_matiere_student_matiere');
        $this->addSql('DROP TABLE note_matiere_student_student');
        $this->addSql('ALTER TABLE note_matiere_student ADD student_id INT DEFAULT NULL, ADD matiere_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note_matiere_student ADD CONSTRAINT FK_11D458BFCB944F1A FOREIGN KEY (student_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE note_matiere_student ADD CONSTRAINT FK_11D458BFF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('CREATE INDEX IDX_11D458BFCB944F1A ON note_matiere_student (student_id)');
        $this->addSql('CREATE INDEX IDX_11D458BFF46CD258 ON note_matiere_student (matiere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note_matiere_student_matiere (note_matiere_student_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_2F9F35E75B9FBD9D (note_matiere_student_id), INDEX IDX_2F9F35E7F46CD258 (matiere_id), PRIMARY KEY(note_matiere_student_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE note_matiere_student_student (note_matiere_student_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_8A8CD9E5B9FBD9D (note_matiere_student_id), INDEX IDX_8A8CD9ECB944F1A (student_id), PRIMARY KEY(note_matiere_student_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE note_matiere_student_matiere ADD CONSTRAINT FK_2F9F35E7F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_matiere_student_matiere ADD CONSTRAINT FK_2F9F35E75B9FBD9D FOREIGN KEY (note_matiere_student_id) REFERENCES note_matiere_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_matiere_student_student ADD CONSTRAINT FK_8A8CD9ECB944F1A FOREIGN KEY (student_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_matiere_student_student ADD CONSTRAINT FK_8A8CD9E5B9FBD9D FOREIGN KEY (note_matiere_student_id) REFERENCES note_matiere_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note_matiere_student DROP FOREIGN KEY FK_11D458BFCB944F1A');
        $this->addSql('ALTER TABLE note_matiere_student DROP FOREIGN KEY FK_11D458BFF46CD258');
        $this->addSql('DROP INDEX IDX_11D458BFCB944F1A ON note_matiere_student');
        $this->addSql('DROP INDEX IDX_11D458BFF46CD258 ON note_matiere_student');
        $this->addSql('ALTER TABLE note_matiere_student DROP student_id, DROP matiere_id');
    }
}
