<?php

namespace App\Entity;

use App\Repository\BusinessAccountTempRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BusinessAccountTempRepository::class)]
class BusinessAccountTemp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $indice_numéro = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_mobile = null;

    #[ORM\Column(length: 255)]
    private ?string $civilite = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_business = null;

    #[ORM\Column(length: 255)]
    private ?string $type_de_pièce = null;

    #[ORM\Column(length: 255)]
    private ?string $forme_juridique = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_FNCE = null;

    #[ORM\Column(length: 255)]
    private ?string $secteur_activite = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $commune = null;

    #[ORM\Column(length: 255)]
    private ?string $quartier = null;

    #[ORM\Column(length: 255)]
    private ?string $indice_telephone_business = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_mobile_business = null;

    #[ORM\Column(length: 255)]
    private ?string $email_business = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_business = null;

    #[ORM\Column(length: 255)]
    private ?string $geolocalisation_gps = null;

    #[ORM\Column(length: 255)]
    private ?string $registre_commerce_RCCM = null;

    #[ORM\Column(length: 255)]
    private ?string $declaration_fiscale_DFE = null;

    #[ORM\Column(length: 255)]
    private ?string $statut_entreprenant_CI_PME = null;

    #[ORM\Column(length: 255)]
    private ?string $chiffres_affaires_previsionnel = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_employes = null;

    #[ORM\Column(length: 255)]
    private ?string $logo_marchand = null;

    #[ORM\Column(length: 255)]
    private ?string $description_activites = null;

    #[ORM\Column(length: 255)]
    private ?string $date_debut_activite = null;

    #[ORM\Column(length: 255)]
    private ?string $chiffre_d_affaire_ecoule = null;

    #[ORM\Column(length: 255)]
    private ?string $surcursale_etranger = null;

    #[ORM\Column(length: 255)]
    private ?string $type_espace_occupe = null;

    #[ORM\Column(length: 255)]
    private ?string $personnalite_publique_impliquee_dans_activite = null;

    #[ORM\Column(length: 255)]
    private ?string $heures_d_ouverture = null;

    #[ORM\Column(length: 255)]
    private ?string $jours_ouverture = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_points_vente = null;

    #[ORM\Column(length: 255)]
    private ?string $volume_transactions_moyenne_mois = null;

    #[ORM\Column(length: 255)]
    private ?string $chiffre_affaire_moyen_mensuel = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_de_clients_jour = null;

    #[ORM\Column(length: 255)]
    private ?string $banque_entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'businessAccountTemps')]
    private ?BusinessAccount $businessAccount = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndiceNuméro(): ?string
    {
        return $this->indice_numéro;
    }

    public function setIndiceNuméro(string $indice_numéro): static
    {
        $this->indice_numéro = $indice_numéro;

        return $this;
    }

    public function getNumeroMobile(): ?string
    {
        return $this->numero_mobile;
    }

    public function setNumeroMobile(string $numero_mobile): static
    {
        $this->numero_mobile = $numero_mobile;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): static
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(string $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getNomBusiness(): ?string
    {
        return $this->nom_business;
    }

    public function setNomBusiness(string $nom_business): static
    {
        $this->nom_business = $nom_business;

        return $this;
    }

    public function getTypeDePièce(): ?string
    {
        return $this->type_de_pièce;
    }

    public function setTypeDePièce(string $type_de_pièce): static
    {
        $this->type_de_pièce = $type_de_pièce;

        return $this;
    }

    public function getFormeJuridique(): ?string
    {
        return $this->forme_juridique;
    }

    public function setFormeJuridique(string $forme_juridique): static
    {
        $this->forme_juridique = $forme_juridique;

        return $this;
    }

    public function getNumeroFNCE(): ?string
    {
        return $this->numero_FNCE;
    }

    public function setNumeroFNCE(string $numero_FNCE): static
    {
        $this->numero_FNCE = $numero_FNCE;

        return $this;
    }

    public function getSecteurActivite(): ?string
    {
        return $this->secteur_activite;
    }

    public function setSecteurActivite(string $secteur_activite): static
    {
        $this->secteur_activite = $secteur_activite;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getIndiceTelephoneBusiness(): ?string
    {
        return $this->indice_telephone_business;
    }

    public function setIndiceTelephoneBusiness(string $indice_telephone_business): static
    {
        $this->indice_telephone_business = $indice_telephone_business;

        return $this;
    }

    public function getNumeroMobileBusiness(): ?string
    {
        return $this->numero_mobile_business;
    }

    public function setNumeroMobileBusiness(string $numero_mobile_business): static
    {
        $this->numero_mobile_business = $numero_mobile_business;

        return $this;
    }

    public function getEmailBusiness(): ?string
    {
        return $this->email_business;
    }

    public function setEmailBusiness(string $email_business): static
    {
        $this->email_business = $email_business;

        return $this;
    }

    public function getAdresseBusiness(): ?string
    {
        return $this->adresse_business;
    }

    public function setAdresseBusiness(string $adresse_business): static
    {
        $this->adresse_business = $adresse_business;

        return $this;
    }

    public function getGeolocalisationGps(): ?string
    {
        return $this->geolocalisation_gps;
    }

    public function setGeolocalisationGps(string $geolocalisation_gps): static
    {
        $this->geolocalisation_gps = $geolocalisation_gps;

        return $this;
    }

    public function getRegistreCommerceRCCM(): ?string
    {
        return $this->registre_commerce_RCCM;
    }

    public function setRegistreCommerceRCCM(string $registre_commerce_RCCM): static
    {
        $this->registre_commerce_RCCM = $registre_commerce_RCCM;

        return $this;
    }

    public function getDeclarationFiscaleDFE(): ?string
    {
        return $this->declaration_fiscale_DFE;
    }

    public function setDeclarationFiscaleDFE(string $declaration_fiscale_DFE): static
    {
        $this->declaration_fiscale_DFE = $declaration_fiscale_DFE;

        return $this;
    }

    public function getStatutEntreprenantCIPME(): ?string
    {
        return $this->statut_entreprenant_CI_PME;
    }

    public function setStatutEntreprenantCIPME(string $statut_entreprenant_CI_PME): static
    {
        $this->statut_entreprenant_CI_PME = $statut_entreprenant_CI_PME;

        return $this;
    }

    public function getChiffresAffairesPrevisionnel(): ?string
    {
        return $this->chiffres_affaires_previsionnel;
    }

    public function setChiffresAffairesPrevisionnel(string $chiffres_affaires_previsionnel): static
    {
        $this->chiffres_affaires_previsionnel = $chiffres_affaires_previsionnel;

        return $this;
    }

    public function getNombreEmployes(): ?string
    {
        return $this->nombre_employes;
    }

    public function setNombreEmployes(string $nombre_employes): static
    {
        $this->nombre_employes = $nombre_employes;

        return $this;
    }

    public function getLogoMarchand(): ?string
    {
        return $this->logo_marchand;
    }

    public function setLogoMarchand(string $logo_marchand): static
    {
        $this->logo_marchand = $logo_marchand;

        return $this;
    }

    public function getDescriptionActivites(): ?string
    {
        return $this->description_activites;
    }

    public function setDescriptionActivites(string $description_activites): static
    {
        $this->description_activites = $description_activites;

        return $this;
    }

    public function getDateDebutActivite(): ?string
    {
        return $this->date_debut_activite;
    }
    public function setDateDebutActivite(string $date_debut_activite): static
    {
        $this->date_debut_activite = $date_debut_activite;

        return $this;
    }

    public function getChiffreDAffaireEcoule(): ?string
    {
        return $this->chiffre_d_affaire_ecoule;
    }

    public function setChiffreDAffaireEcoule(string $chiffre_d_affaire_ecoule): static
    {
        $this->chiffre_d_affaire_ecoule = $chiffre_d_affaire_ecoule;

        return $this;
    }

    public function getSurcursaleEtranger(): ?string
    {
        return $this->surcursale_etranger;
    }

    public function setSurcursaleEtranger(string $surcursale_etranger): static
    {
        $this->surcursale_etranger = $surcursale_etranger;

        return $this;
    }

    public function getTypeEspaceOccupe(): ?string
    {
        return $this->type_espace_occupe;
    }

    public function setTypeEspaceOccupe(string $type_espace_occupe): static
    {
        $this->type_espace_occupe = $type_espace_occupe;

        return $this;
    }

    public function getPersonnalitePubliqueImpliqueeDansActivite(): ?string
    {
        return $this->personnalite_publique_impliquee_dans_activite;
    }

    public function setPersonnalitePubliqueImpliqueeDansActivite(string $personnalite_publique_impliquee_dans_activite): static
    {
        $this->personnalite_publique_impliquee_dans_activite = $personnalite_publique_impliquee_dans_activite;

        return $this;
    }

    public function getHeuresDOuverture(): ?string
    {
        return $this->heures_d_ouverture;
    }

    public function setHeuresDOuverture(string $heures_d_ouverture): static
    {
        $this->heures_d_ouverture = $heures_d_ouverture;

        return $this;
    }

    public function getJoursOuverture(): ?string
    {
        return $this->jours_ouverture;
    }

    public function setJoursOuverture(string $jours_ouverture): static
    {
        $this->jours_ouverture = $jours_ouverture;

        return $this;
    }

    public function getNombrePointsVente(): ?string
    {
        return $this->nombre_points_vente;
    }

    public function setNombrePointsVente(string $nombre_points_vente): static
    {
        $this->nombre_points_vente = $nombre_points_vente;

        return $this;
    }

    public function getVolumeTransactionsMoyenneMois(): ?string
    {
        return $this->volume_transactions_moyenne_mois;
    }

    public function setVolumeTransactionsMoyenneMois(string $volume_transactions_moyenne_mois): static
    {
        $this->volume_transactions_moyenne_mois = $volume_transactions_moyenne_mois;

        return $this;
    }

    public function getChiffreAffaireMoyenMensuel(): ?string
    {
        return $this->chiffre_affaire_moyen_mensuel;
    }

    public function setChiffreAffaireMoyenMensuel(string $chiffre_affaire_moyen_mensuel): static
    {
        $this->chiffre_affaire_moyen_mensuel = $chiffre_affaire_moyen_mensuel;

        return $this;
    }

    public function getNombreDeClientsJour(): ?string
    {
        return $this->nombre_de_clients_jour;
    }

    public function setNombreDeClientsJour(string $nombre_de_clients_jour): static
    {
        $this->nombre_de_clients_jour = $nombre_de_clients_jour;

        return $this;
    }

    public function getBanqueEntreprise(): ?string
    {
        return $this->banque_entreprise;
    }

    public function setBanqueEntreprise(string $banque_entreprise): static
    {
        $this->banque_entreprise = $banque_entreprise;

        return $this;
    }

    public function getBusinessAccount(): ?BusinessAccount
    {
        return $this->businessAccount;
    }

    public function setBusinessAccount(?BusinessAccount $businessAccount): static
    {
        $this->businessAccount = $businessAccount;

        return $this;
    }

}
