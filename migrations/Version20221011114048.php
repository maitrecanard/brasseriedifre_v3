<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011114048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A944722F2');
        $this->addSql('DROP INDEX IDX_B3BA5A5A944722F2 ON products');
        $this->addSql('ALTER TABLE products DROP prix_id');
        $this->addSql('ALTER TABLE quantities DROP FOREIGN KEY FK_F1B1B53C944722F2');
        $this->addSql('DROP INDEX IDX_F1B1B53C944722F2 ON quantities');
        $this->addSql('ALTER TABLE quantities DROP prix_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD prix_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A944722F2 FOREIGN KEY (prix_id) REFERENCES prix (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A944722F2 ON products (prix_id)');
        $this->addSql('ALTER TABLE quantities ADD prix_id INT NOT NULL');
        $this->addSql('ALTER TABLE quantities ADD CONSTRAINT FK_F1B1B53C944722F2 FOREIGN KEY (prix_id) REFERENCES prix (id)');
        $this->addSql('CREATE INDEX IDX_F1B1B53C944722F2 ON quantities (prix_id)');
    }
}
