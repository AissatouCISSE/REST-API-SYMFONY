<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828104809 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE compte (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, numagence VARCHAR(255) NOT NULL, numcompte VARCHAR(255) NOT NULL, clerib INT NOT NULL, solde INT NOT NULL, INDEX IDX_CFF6526019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, typeoperation_id INT DEFAULT NULL, typebeneficiaire_id INT DEFAULT NULL, compte_id INT DEFAULT NULL, montant INT NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_1981A66D510850EC (typeoperation_id), INDEX IDX_1981A66DD0426B73 (typebeneficiaire_id), INDEX IDX_1981A66DF2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typeoperation (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D510850EC FOREIGN KEY (typeoperation_id) REFERENCES typeoperation (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DD0426B73 FOREIGN KEY (typebeneficiaire_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DF2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DD0426B73');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DF2C56620');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D510850EC');
        $this->addSql('DROP TABLE compte');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE typeoperation');
    }
}
