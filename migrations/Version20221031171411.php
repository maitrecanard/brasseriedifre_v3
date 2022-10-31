<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031171411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement ADD partner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historic_movement ADD CONSTRAINT FK_906D25089393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('CREATE INDEX IDX_906D25089393F8FE ON historic_movement (partner_id)');
        $this->addSql('ALTER TABLE partner ADD historic_movement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partner ADD CONSTRAINT FK_312B3E16B3A2591A FOREIGN KEY (historic_movement_id) REFERENCES historic_movement (id)');
        $this->addSql('CREATE INDEX IDX_312B3E16B3A2591A ON partner (historic_movement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement DROP FOREIGN KEY FK_906D25089393F8FE');
        $this->addSql('DROP INDEX IDX_906D25089393F8FE ON historic_movement');
        $this->addSql('ALTER TABLE historic_movement DROP partner_id');
        $this->addSql('ALTER TABLE partner DROP FOREIGN KEY FK_312B3E16B3A2591A');
        $this->addSql('DROP INDEX IDX_312B3E16B3A2591A ON partner');
        $this->addSql('ALTER TABLE partner DROP historic_movement_id');
    }
}
