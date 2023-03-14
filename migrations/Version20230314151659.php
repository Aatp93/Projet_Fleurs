<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230314151659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post ADD actualite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DA2843073 FOREIGN KEY (actualite_id) REFERENCES actualite (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A8A6C8DA2843073 ON post (actualite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DA2843073');
        $this->addSql('DROP INDEX UNIQ_5A8A6C8DA2843073 ON post');
        $this->addSql('ALTER TABLE post DROP actualite_id');
    }
}
