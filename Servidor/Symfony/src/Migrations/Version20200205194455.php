<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205194455 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mssql', 'Migration can only be executed safely on \'mssql\'.');

        $this->addSql('CREATE TABLE student (id INT IDENTITY NOT NULL, user_id INT NOT NULL, name NVARCHAR(255) NOT NULL, surname NVARCHAR(255) NOT NULL, address NVARCHAR(255) NOT NULL, city NVARCHAR(30) NOT NULL, province NVARCHAR(18) NOT NULL, birthDate DATE NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF339D86650F ON student (user_id) WHERE user_id IS NOT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF339D86650F FOREIGN KEY (user_id) REFERENCES [user] (id)');
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
        $this->addSql('DROP TABLE student');
    }
}
