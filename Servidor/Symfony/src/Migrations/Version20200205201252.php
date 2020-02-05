<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205201252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mssql', 'Migration can only be executed safely on \'mssql\'.');

        $this->addSql('CREATE TABLE unit (id INT IDENTITY NOT NULL, course_id INT NOT NULL, number INT NOT NULL, name NVARCHAR(255) NOT NULL, goals VARCHAR(MAX), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_DCBB0C53591CC992 ON unit (course_id)');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mssql', 'Migration can only be executed safely on \'mssql\'.');

//        $this->addSql('CREATE SCHEMA db_accessadmin');
//        $this->addSql('CREATE SCHEMA db_backupoperator');
//        $this->addSql('CREATE SCHEMA db_datareader');
//        $this->addSql('CREATE SCHEMA db_datawriter');
//        $this->addSql('CREATE SCHEMA db_ddladmin');
//        $this->addSql('CREATE SCHEMA db_denydatareader');
//        $this->addSql('CREATE SCHEMA db_denydatawriter');
//        $this->addSql('CREATE SCHEMA db_owner');
//        $this->addSql('CREATE SCHEMA db_securityadmin');
//        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('DROP TABLE unit');
    }
}
