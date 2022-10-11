<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221011113742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prix (id INT AUTO_INCREMENT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, prix_id INT NOT NULL, name VARCHAR(150) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, slug VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(300) NOT NULL, degre VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, vue INT DEFAULT NULL, active INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B3BA5A5A944722F2 (prix_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quantities (id INT AUTO_INCREMENT NOT NULL, prix_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_F1B1B53C944722F2 (prix_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitor (id INT AUTO_INCREMENT NOT NULL, ip VARCHAR(15) NOT NULL, date DATE NOT NULL, device VARCHAR(2000) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A944722F2 FOREIGN KEY (prix_id) REFERENCES prix (id)');
        $this->addSql('ALTER TABLE quantities ADD CONSTRAINT FK_F1B1B53C944722F2 FOREIGN KEY (prix_id) REFERENCES prix (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A944722F2');
        $this->addSql('ALTER TABLE quantities DROP FOREIGN KEY FK_F1B1B53C944722F2');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE prix');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE quantities');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE visitor');
    }
}
