<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828111143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DD0426B73');
        $this->addSql('DROP INDEX IDX_1981A66DD0426B73 ON operation');
        $this->addSql('ALTER TABLE operation CHANGE typebeneficiaire_id beneficiaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D5AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_1981A66D5AF81F68 ON operation (beneficiaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D5AF81F68');
        $this->addSql('DROP INDEX IDX_1981A66D5AF81F68 ON operation');
        $this->addSql('ALTER TABLE operation CHANGE beneficiaire_id typebeneficiaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DD0426B73 FOREIGN KEY (typebeneficiaire_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_1981A66DD0426B73 ON operation (typebeneficiaire_id)');
    }
}
