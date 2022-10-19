<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019184946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prix ADD quantity_id INT NOT NULL');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5E7E8B4AFC FOREIGN KEY (quantity_id) REFERENCES quantities (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F7EFEA5E7E8B4AFC ON prix (quantity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5E7E8B4AFC');
        $this->addSql('DROP INDEX UNIQ_F7EFEA5E7E8B4AFC ON prix');
        $this->addSql('ALTER TABLE prix DROP quantity_id');
    }
}
