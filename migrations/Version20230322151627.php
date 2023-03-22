<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230322151627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD image_size INT DEFAULT NULL, CHANGE img image VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE atelier ADD created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD image_size INT DEFAULT NULL, CHANGE img image VARCHAR(5000) NOT NULL');
        $this->addSql('ALTER TABLE graine CHANGE updated_at created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP created_at, DROP image_size, CHANGE image img VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE atelier DROP created_at, DROP image_size, CHANGE image img VARCHAR(5000) NOT NULL');
        $this->addSql('ALTER TABLE graine CHANGE created_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
