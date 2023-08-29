<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803110700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, indice VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, date_emission_piece VARCHAR(255) NOT NULL, date_expiration_piece VARCHAR(255) NOT NULL, file_photo VARCHAR(255) NOT NULL, file_cni VARCHAR(255) NOT NULL, piece_number VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE account_temp (id INT AUTO_INCREMENT NOT NULL, account_id INT DEFAULT NULL, indice VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, profession VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, date_emission_piece VARCHAR(255) NOT NULL, date_expiration_piece VARCHAR(255) NOT NULL, file_photo VARCHAR(255) NOT NULL, file_cni VARCHAR(255) NOT NULL, piece_number VARCHAR(255) NOT NULL, INDEX IDX_87C002609B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_account (id INT AUTO_INCREMENT NOT NULL, indice_numéro VARCHAR(255) NOT NULL, numero_mobile VARCHAR(255) NOT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nom_business VARCHAR(255) NOT NULL, type_de_pièce VARCHAR(255) NOT NULL, forme_juridique VARCHAR(255) NOT NULL, numero_fnce VARCHAR(255) NOT NULL, secteur_activite VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, indice_telephone_business VARCHAR(255) NOT NULL, numero_mobile_business VARCHAR(255) NOT NULL, email_business VARCHAR(255) NOT NULL, adresse_business VARCHAR(255) NOT NULL, geolocalisation_gps VARCHAR(255) NOT NULL, registre_commerce_rccm VARCHAR(255) NOT NULL, declaration_fiscale_dfe VARCHAR(255) NOT NULL, statut_entreprenant_ci_pme VARCHAR(255) NOT NULL, chiffres_affaires_previsionnel VARCHAR(255) NOT NULL, nombre_employes VARCHAR(255) NOT NULL, logo_marchand VARCHAR(255) NOT NULL, description_activites VARCHAR(255) NOT NULL, date_debut_activite VARCHAR(255) NOT NULL, chiffre_d_affaire_ecoule VARCHAR(255) NOT NULL, surcursale_etranger VARCHAR(255) NOT NULL, type_espace_occupe VARCHAR(255) NOT NULL, personnalite_publique_impliquee_dans_activite VARCHAR(255) NOT NULL, heures_d_ouverture VARCHAR(255) NOT NULL, jours_ouverture VARCHAR(255) NOT NULL, nombre_points_vente VARCHAR(255) NOT NULL, volume_transactions_moyenne_mois VARCHAR(255) NOT NULL, chiffre_affaire_moyen_mensuel VARCHAR(255) NOT NULL, nombre_de_clients_jour VARCHAR(255) NOT NULL, banque_entreprise VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business_account_temp (id INT AUTO_INCREMENT NOT NULL, business_account_id INT DEFAULT NULL, indice_numéro VARCHAR(255) NOT NULL, numero_mobile VARCHAR(255) NOT NULL, civilite VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, nom_business VARCHAR(255) NOT NULL, type_de_pièce VARCHAR(255) NOT NULL, forme_juridique VARCHAR(255) NOT NULL, numero_fnce VARCHAR(255) NOT NULL, secteur_activite VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, quartier VARCHAR(255) NOT NULL, indice_telephone_business VARCHAR(255) NOT NULL, numero_mobile_business VARCHAR(255) NOT NULL, email_business VARCHAR(255) NOT NULL, adresse_business VARCHAR(255) NOT NULL, geolocalisation_gps VARCHAR(255) NOT NULL, registre_commerce_rccm VARCHAR(255) NOT NULL, declaration_fiscale_dfe VARCHAR(255) NOT NULL, statut_entreprenant_ci_pme VARCHAR(255) NOT NULL, chiffres_affaires_previsionnel VARCHAR(255) NOT NULL, nombre_employes VARCHAR(255) NOT NULL, logo_marchand VARCHAR(255) NOT NULL, description_activites VARCHAR(255) NOT NULL, date_debut_activite VARCHAR(255) NOT NULL, chiffre_d_affaire_ecoule VARCHAR(255) NOT NULL, surcursale_etranger VARCHAR(255) NOT NULL, type_espace_occupe VARCHAR(255) NOT NULL, personnalite_publique_impliquee_dans_activite VARCHAR(255) NOT NULL, heures_d_ouverture VARCHAR(255) NOT NULL, jours_ouverture VARCHAR(255) NOT NULL, nombre_points_vente VARCHAR(255) NOT NULL, volume_transactions_moyenne_mois VARCHAR(255) NOT NULL, chiffre_affaire_moyen_mensuel VARCHAR(255) NOT NULL, nombre_de_clients_jour VARCHAR(255) NOT NULL, banque_entreprise VARCHAR(255) NOT NULL, INDEX IDX_C4E82FD35BC85711 (business_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_file (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, saved VARCHAR(255) NOT NULL, unsaved VARCHAR(255) NOT NULL, active_user VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loop_log (id INT AUTO_INCREMENT NOT NULL, file_id INT DEFAULT NULL, status_code VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, position VARCHAR(255) NOT NULL, is_loop_error TINYINT(1) NOT NULL, log_description LONGTEXT DEFAULT NULL, INDEX IDX_7CF8A5F293CB796C (file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account_temp ADD CONSTRAINT FK_87C002609B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE business_account_temp ADD CONSTRAINT FK_C4E82FD35BC85711 FOREIGN KEY (business_account_id) REFERENCES business_account (id)');
        $this->addSql('ALTER TABLE loop_log ADD CONSTRAINT FK_7CF8A5F293CB796C FOREIGN KEY (file_id) REFERENCES data_file (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE account_temp DROP FOREIGN KEY FK_87C002609B6B5FBA');
        $this->addSql('ALTER TABLE business_account_temp DROP FOREIGN KEY FK_C4E82FD35BC85711');
        $this->addSql('ALTER TABLE loop_log DROP FOREIGN KEY FK_7CF8A5F293CB796C');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE account_temp');
        $this->addSql('DROP TABLE business_account');
        $this->addSql('DROP TABLE business_account_temp');
        $this->addSql('DROP TABLE data_file');
        $this->addSql('DROP TABLE loop_log');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
