<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019185624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD price_id INT NOT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AD614C7E7 FOREIGN KEY (price_id) REFERENCES prix (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AD614C7E7 ON products (price_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AD614C7E7');
        $this->addSql('DROP INDEX IDX_B3BA5A5AD614C7E7 ON products');
        $this->addSql('ALTER TABLE products DROP price_id');
    }
}
