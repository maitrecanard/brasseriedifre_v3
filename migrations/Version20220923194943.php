<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220923194943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, subtitle VARCHAR(255) DEFAULT NULL, slug VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(300) NOT NULL, degre VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, vue INT DEFAULT NULL, active INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE click_by_day');
        $this->addSql('DROP TABLE exploitant');
        $this->addSql('DROP TABLE allgoodies');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE count_view_article');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE otherarticle');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE bestProduct');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE module_dashboard');
        $this->addSql('DROP TABLE mentions_legales');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE article_img');
        $this->addSql('DROP TABLE count_look_product');
        $this->addSql('DROP TABLE artistes');
        $this->addSql('DROP TABLE imge_error_rand');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE modules_count_dashboard');
        $this->addSql('DROP TABLE allbieres');
        $this->addSql('DROP TABLE alert');
        $this->addSql('DROP TABLE count_look_movies');
        $this->addSql('DROP TABLE google_map');
        $this->addSql('DROP TABLE content_mail_contact');
        $this->addSql('DROP TABLE menu_admin');
        $this->addSql('DROP TABLE analytics');
        $this->addSql('DROP TABLE maintenance');
        $this->addSql('DROP TABLE allBieresPeriodeNotNull');
        $this->addSql('DROP TABLE allProduct');
        $this->addSql('DROP TABLE articles_category');
        $this->addSql('DROP TABLE contact_mail');
        $this->addSql('DROP TABLE img_error');
        $this->addSql('ALTER TABLE visitor CHANGE ip ip VARCHAR(15) NOT NULL, CHANGE date date DATE NOT NULL, CHANGE device device VARCHAR(2000) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE click_by_day (date DATETIME NOT NULL, total INT DEFAULT NULL, article_id INT NOT NULL, INDEX article_id (article_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE exploitant (id INT AUTO_INCREMENT NOT NULL, e_name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, e_logo VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, e_mail VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, e_siren INT DEFAULT NULL, e_adress VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, e_city VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, e_zipcode INT DEFAULT NULL, e_phone VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, e_url_access VARCHAR(50) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, e_token VARCHAR(40) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE allgoodies (p_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_slug VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_type VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_img VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, pp_prix VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, valid INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE count_view_article (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, nb INT DEFAULT NULL, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, subtitle VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, slug VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, content TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, img VARCHAR(150) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, modif DATETIME DEFAULT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, slug VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, subtitle VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, img VARCHAR(150) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, img_background VARCHAR(150) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, content TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, modif DATETIME DEFAULT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE otherarticle (id_article INT DEFAULT NULL, title VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, subtitle VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, slug VARCHAR(200) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, keybord TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, a_description TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, content TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, img TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, modif DATETIME DEFAULT NULL, a_activ INT DEFAULT NULL, fk_category INT DEFAULT NULL, fk_type INT DEFAULT NULL, id INT DEFAULT NULL, name VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, description TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, activ INT DEFAULT NULL) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, description TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, content TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, modif DATETIME DEFAULT NULL, article_id INT DEFAULT NULL, artiste_id INT DEFAULT NULL, site_id INT DEFAULT NULL, stop INT DEFAULT NULL, activ INT DEFAULT NULL, INDEX artiste_id (artiste_id), INDEX site_id (site_id), INDEX article_id (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bestProduct (name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, img VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, nb INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mail (id_message INT AUTO_INCREMENT NOT NULL, m_name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, m_mail VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, m_content TEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, m_sender VARCHAR(1) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, m_etat INT NOT NULL, PRIMARY KEY(id_message)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE module_dashboard (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, module INT NOT NULL, libelle1 VARCHAR(250) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, libelle2 VARCHAR(250) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, libelle3 VARCHAR(250) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, option1 VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, option2 VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, option3 VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, fk_module INT DEFAULT NULL, model VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE mentions_legales (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, image VARCHAR(200) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, description TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE article_img (id INT AUTO_INCREMENT NOT NULL, img VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, article_id INT NOT NULL, activ INT DEFAULT NULL, INDEX article_id (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE count_look_product (id INT AUTO_INCREMENT NOT NULL, fk_produit INT NOT NULL, clp_nb INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE artistes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, description TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, img VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, img_background VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, stop INT DEFAULT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE imge_error_rand (id INT NOT NULL, url TEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE articles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, subtitle VARCHAR(200) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, slug VARCHAR(200) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, modif DATETIME DEFAULT NULL, description TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, image VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, quantityone DOUBLE PRECISION DEFAULT NULL, priceone DOUBLE PRECISION DEFAULT NULL, pricetwo DOUBLE PRECISION DEFAULT NULL, quantitytwo DOUBLE PRECISION NOT NULL, price INT DEFAULT NULL, quantity INT DEFAULT NULL, degre DOUBLE PRECISION DEFAULT NULL, category_id INT NOT NULL, content TEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, activHome INT DEFAULT NULL, activ INT DEFAULT NULL, INDEX category_id (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, list_menu INT NOT NULL, sub_menu INT DEFAULT NULL, title VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, url VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, img VARCHAR(100) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, page_id INT DEFAULT NULL, oder INT DEFAULT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE modules_count_dashboard (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, controller VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, function1 VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, function2 VARCHAR(20) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE allbieres (id INT DEFAULT NULL, p_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_type VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_img VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_slug VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prixone VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, quantiteone VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prixtwo VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, quantitetwo VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE alert (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, content TEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_general_ci`, fk_page INT DEFAULT NULL, fk_article INT DEFAULT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE count_look_movies (nb INT DEFAULT NULL, fk_movie INT NOT NULL) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE google_map (id_google_map INT AUTO_INCREMENT NOT NULL, gm_name VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_cs`, gm_content TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_cs`, gm_script TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_general_cs`, gm_activ INT NOT NULL, PRIMARY KEY(id_google_map)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_general_cs` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE content_mail_contact (id INT AUTO_INCREMENT NOT NULL, fk_contact_mail INT NOT NULL, cmc_topic VARCHAR(250) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, cmc_content TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, cmc_created DATETIME DEFAULT CURRENT_TIMESTAMP, cmc_sender VARCHAR(1) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, cmc_statut INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE menu_admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description TEXT CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, submenu INT DEFAULT NULL, url VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, roles INT NOT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE analytics (id INT AUTO_INCREMENT NOT NULL, value TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, activ TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE maintenance (id INT AUTO_INCREMENT NOT NULL, activ INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE allBieresPeriodeNotNull (p_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_type VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_img VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_slug VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prixone VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, quantiteone VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, prixtwo VARCHAR(5) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, quantitetwo VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE allProduct (id_product INT DEFAULT NULL, p_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, p_modified DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, p_activ INT DEFAULT NULL, tp_name VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, p_img VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, clp_nb INT DEFAULT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE articles_category (articles_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_A7D8EFDB1EBAF6CC (articles_id), INDEX IDX_A7D8EFDB12469DE2 (category_id), PRIMARY KEY(articles_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact_mail (id INT AUTO_INCREMENT NOT NULL, cm_name VARCHAR(200) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, cm_email VARCHAR(150) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, cm_create_contact DATETIME DEFAULT CURRENT_TIMESTAMP, cm_token VARCHAR(128) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, cm_firstname VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, cm_lastname VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE img_error (id INT AUTO_INCREMENT NOT NULL, url TEXT CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE products');
        $this->addSql('ALTER TABLE visitor CHANGE ip ip VARCHAR(20) NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE device device LONGTEXT NOT NULL');
    }
}
