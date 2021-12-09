<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211209112526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2DC4ED0B8');
        $this->addSql('DROP INDEX UNIQ_24CC0DF2DC4ED0B8 ON panier');
        $this->addSql('ALTER TABLE panier ADD produits_id INT DEFAULT NULL, CHANGE ueser_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2CD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_24CC0DF2A76ED395 ON panier (user_id)');
        $this->addSql('CREATE INDEX IDX_24CC0DF2CD11A2CF ON panier (produits_id)');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8CF77D927C');
        $this->addSql('DROP INDEX IDX_BE2DDF8CF77D927C ON produits');
        $this->addSql('ALTER TABLE produits DROP panier_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2A76ED395');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2CD11A2CF');
        $this->addSql('DROP INDEX UNIQ_24CC0DF2A76ED395 ON panier');
        $this->addSql('DROP INDEX IDX_24CC0DF2CD11A2CF ON panier');
        $this->addSql('ALTER TABLE panier ADD ueser_id INT DEFAULT NULL, DROP user_id, DROP produits_id');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2DC4ED0B8 FOREIGN KEY (ueser_id) REFERENCES users (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_24CC0DF2DC4ED0B8 ON panier (ueser_id)');
        $this->addSql('ALTER TABLE produits ADD panier_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8CF77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8CF77D927C ON produits (panier_id)');
    }
}
