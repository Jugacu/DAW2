<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205200211 extends AbstractMigration
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
        $this->addSql('sp_RENAME \'student.birthdate\', \'birth_date\', \'COLUMN\'');
        $this->addSql('EXEC sp_RENAME N\'student.uniq_b723af339d86650f\', N\'UNIQ_B723AF33A76ED395\', N\'INDEX\'');
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
        $this->addSql('DROP TABLE course');
        $this->addSql('sp_RENAME \'student.birth_date\', \'birthDate\', \'COLUMN\'');
        $this->addSql('EXEC sp_RENAME N\'student.uniq_b723af33a76ed395\', N\'UNIQ_B723AF339D86650F\', N\'INDEX\'');
    }
}
