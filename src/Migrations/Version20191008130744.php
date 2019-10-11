<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008130744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE producto');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, cateforia_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, descripcion VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, categoria VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, stock VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, imagen VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_A7BB0615FF3D70E4 (cateforia_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB0615FF3D70E4 FOREIGN KEY (cateforia_id) REFERENCES categoria (id)');
    }
}
