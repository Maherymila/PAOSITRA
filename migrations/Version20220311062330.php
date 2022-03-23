<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311062330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mouvements (id INT AUTO_INCREMENT NOT NULL, produits_id INT DEFAULT NULL, action_id INT DEFAULT NULL, agences_id INT DEFAULT NULL, administrateur_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, quantiter INT NOT NULL, date DATE NOT NULL, INDEX IDX_DA34835CCD11A2CF (produits_id), INDEX IDX_DA34835C9D32F035 (action_id), INDEX IDX_DA34835C9917E4AB (agences_id), INDEX IDX_DA34835C7EE5403C (administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mouvements ADD CONSTRAINT FK_DA34835CCD11A2CF FOREIGN KEY (produits_id) REFERENCES produits (id)');
        $this->addSql('ALTER TABLE mouvements ADD CONSTRAINT FK_DA34835C9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE mouvements ADD CONSTRAINT FK_DA34835C9917E4AB FOREIGN KEY (agences_id) REFERENCES agences (id)');
        $this->addSql('ALTER TABLE mouvements ADD CONSTRAINT FK_DA34835C7EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE mouvements');
        $this->addSql('ALTER TABLE action CHANGE type_action type_action VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE produit produit VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE administrateur CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code code VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE agences CHANGE centre centre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE responsable responsable VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE drpm drpm VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE bureau CHANGE nombureau nombureau VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE annuaire annuaire VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE classe classe VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie CHANGE nom_categorie nom_categorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produits CHANGE nom_produits nom_produits VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE abbreviation abbreviation VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
