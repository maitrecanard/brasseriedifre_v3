<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109130046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement ADD page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historic_movement ADD CONSTRAINT FK_906D2508C4663E4 FOREIGN KEY (page_id) REFERENCES pages (id)');
        $this->addSql('CREATE INDEX IDX_906D2508C4663E4 ON historic_movement (page_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement DROP FOREIGN KEY FK_906D2508C4663E4');
        $this->addSql('DROP INDEX IDX_906D2508C4663E4 ON historic_movement');
        $this->addSql('ALTER TABLE historic_movement DROP page_id');
        $this->addSql('ALTER TABLE partner CHANGE description description LONGTEXT DEFAULT NULL');
    }
}
