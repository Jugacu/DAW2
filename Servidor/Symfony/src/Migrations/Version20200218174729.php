<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200218174729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mssql', 'Migration can only be executed safely on \'mssql\'.');

        $this->addSql('CREATE TABLE course (id INT IDENTITY NOT NULL, name NVARCHAR(255) NOT NULL, hours INT NOT NULL, description NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE enrollment (id INT IDENTITY NOT NULL, course_id INT NOT NULL, student_id INT NOT NULL, date DATE NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_DBDCD7E1591CC992 ON enrollment (course_id)');
        $this->addSql('CREATE INDEX IDX_DBDCD7E1CB944F1A ON enrollment (student_id)');
        $this->addSql('CREATE TABLE student (id INT IDENTITY NOT NULL, user_id INT NOT NULL, name NVARCHAR(255) NOT NULL, surname NVARCHAR(255) NOT NULL, address NVARCHAR(255) NOT NULL, city NVARCHAR(30) NOT NULL, province NVARCHAR(18) NOT NULL, birth_date DATE NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33A76ED395 ON student (user_id) WHERE user_id IS NOT NULL');
        $this->addSql('CREATE TABLE unit (id INT IDENTITY NOT NULL, course_id INT NOT NULL, number INT NOT NULL, name NVARCHAR(255) NOT NULL, goals VARCHAR(MAX), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_DCBB0C53591CC992 ON unit (course_id)');
        $this->addSql('CREATE TABLE users (id INT IDENTITY NOT NULL, name NVARCHAR(20) NOT NULL, password NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E1591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E1CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mssql', 'Migration can only be executed safely on \'mssql\'.');

        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE enrollment DROP CONSTRAINT FK_DBDCD7E1591CC992');
        $this->addSql('ALTER TABLE unit DROP CONSTRAINT FK_DCBB0C53591CC992');
        $this->addSql('ALTER TABLE enrollment DROP CONSTRAINT FK_DBDCD7E1CB944F1A');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF33A76ED395');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE enrollment');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE users');
    }
}
