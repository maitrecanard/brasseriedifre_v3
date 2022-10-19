<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019190427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prix ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5E4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_F7EFEA5E4584665A ON prix (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5E4584665A');
        $this->addSql('DROP INDEX IDX_F7EFEA5E4584665A ON prix');
        $this->addSql('ALTER TABLE prix DROP product_id');
    }
}
