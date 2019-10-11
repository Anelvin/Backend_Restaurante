<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008125259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producto ADD cateforia_id INT DEFAULT NULL, DROP proveedor');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615FF3D70E4 FOREIGN KEY (cateforia_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_A7BB0615FF3D70E4 ON producto (cateforia_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE producto DROP FOREIGN KEY FK_A7BB0615FF3D70E4');
        $this->addSql('DROP INDEX IDX_A7BB0615FF3D70E4 ON producto');
        $this->addSql('ALTER TABLE producto ADD proveedor VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP cateforia_id');
    }
}
