<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221019131350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE historic_movement ADD CONSTRAINT FK_906D2508A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_906D2508A76ED395 ON historic_movement (user_id)');
        $this->addSql('ALTER TABLE prix ADD CONSTRAINT FK_F7EFEA5E6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_F7EFEA5E6C8A81A9 ON prix (products_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historic_movement DROP FOREIGN KEY FK_906D2508A76ED395');
        $this->addSql('DROP INDEX IDX_906D2508A76ED395 ON historic_movement');
        $this->addSql('ALTER TABLE historic_movement DROP user_id');
        $this->addSql('ALTER TABLE prix DROP FOREIGN KEY FK_F7EFEA5E6C8A81A9');
        $this->addSql('DROP INDEX IDX_F7EFEA5E6C8A81A9 ON prix');
    }
}
