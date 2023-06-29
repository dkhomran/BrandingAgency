<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629185014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blogs (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_F41BCA70CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_5C93B3A4BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_categories (id INT AUTO_INCREMENT NOT NULL, profile_id INT NOT NULL, name VARCHAR(255) NOT NULL, descriiption LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_8C4CD792CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type_service INT NOT NULL, service_title VARCHAR(255) NOT NULL, service_description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, service_details LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_7332E169BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_categories (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, logo VARCHAR(255) NOT NULL, INDEX IDX_881906C5CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blogs ADD CONSTRAINT FK_F41BCA70CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4BCF5E72D FOREIGN KEY (categorie_id) REFERENCES projects_categories (id)');
        $this->addSql('ALTER TABLE projects_categories ADD CONSTRAINT FK_8C4CD792CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169BCF5E72D FOREIGN KEY (categorie_id) REFERENCES services_categories (id)');
        $this->addSql('ALTER TABLE services_categories ADD CONSTRAINT FK_881906C5CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blogs DROP FOREIGN KEY FK_F41BCA70CCFA12B8');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4BCF5E72D');
        $this->addSql('ALTER TABLE projects_categories DROP FOREIGN KEY FK_8C4CD792CCFA12B8');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169BCF5E72D');
        $this->addSql('ALTER TABLE services_categories DROP FOREIGN KEY FK_881906C5CCFA12B8');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CCFA12B8');
        $this->addSql('DROP TABLE blogs');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE projects_categories');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE services_categories');
        $this->addSql('DROP TABLE user');
    }
}
