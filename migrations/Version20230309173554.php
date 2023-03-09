<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309173554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(50000) NOT NULL, img VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(500) NOT NULL, date DATE NOT NULL, img VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6EEAA67DFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE graine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, poid DOUBLE PRECISION NOT NULL, couleur VARCHAR(255) NOT NULL, img VARCHAR(500) NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, INDEX IDX_24CC0DF282EA2E54 (commande_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier_graine (panier_id INT NOT NULL, graine_id INT NOT NULL, INDEX IDX_90E27CC7F77D927C (panier_id), INDEX IDX_90E27CC781BEA5D2 (graine_id), PRIMARY KEY(panier_id, graine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, actualite_id INT DEFAULT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7C890FABA76ED395 (user_id), UNIQUE INDEX UNIQ_7C890FABA2843073 (actualite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reserve (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, atelier_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_1FE0EA22FB88E14F (utilisateur_id), INDEX IDX_1FE0EA2282E2CF35 (atelier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF282EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE panier_graine ADD CONSTRAINT FK_90E27CC7F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_graine ADD CONSTRAINT FK_90E27CC781BEA5D2 FOREIGN KEY (graine_id) REFERENCES graine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FABA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FABA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id)');
        $this->addSql('ALTER TABLE reserve ADD CONSTRAINT FK_1FE0EA22FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reserve ADD CONSTRAINT FK_1FE0EA2282E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFB88E14F');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF282EA2E54');
        $this->addSql('ALTER TABLE panier_graine DROP FOREIGN KEY FK_90E27CC7F77D927C');
        $this->addSql('ALTER TABLE panier_graine DROP FOREIGN KEY FK_90E27CC781BEA5D2');
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FABA76ED395');
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FABA2843073');
        $this->addSql('ALTER TABLE reserve DROP FOREIGN KEY FK_1FE0EA22FB88E14F');
        $this->addSql('ALTER TABLE reserve DROP FOREIGN KEY FK_1FE0EA2282E2CF35');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE graine');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE panier_graine');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE reserve');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
