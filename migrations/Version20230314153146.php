<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314153146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD description VARCHAR(5000) NOT NULL, ADD img VARCHAR(500) NOT NULL');
        $this->addSql('ALTER TABLE atelier ADD description VARCHAR(5000) NOT NULL, ADD img VARCHAR(5000) NOT NULL');
        $this->addSql('ALTER TABLE graine ADD poid DOUBLE PRECISION NOT NULL, ADD couleur VARCHAR(255) NOT NULL, ADD img VARCHAR(5000) NOT NULL, ADD prix DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite DROP description, DROP img');
        $this->addSql('ALTER TABLE atelier DROP description, DROP img');
        $this->addSql('ALTER TABLE graine DROP poid, DROP couleur, DROP img, DROP prix');
    }
}
