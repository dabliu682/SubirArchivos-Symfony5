<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529163044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA archivos');
        $this->addSql('CREATE SEQUENCE archivos.anexos_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE archivos.anexos (id INT NOT NULL, fecha DATE NOT NULL, hora TIME(0) WITHOUT TIME ZONE NOT NULL, anexo1 TEXT DEFAULT NULL, ext1 TEXT DEFAULT NULL, anexo2 TEXT DEFAULT NULL, ext2 TEXT DEFAULT NULL, anexo3 TEXT DEFAULT NULL, ext3 TEXT DEFAULT NULL, anexo4 TEXT DEFAULT NULL, ext4 TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE archivos.anexos_id_seq CASCADE');
        $this->addSql('DROP TABLE archivos.anexos');
    }
}
