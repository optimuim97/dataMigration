<?php

namespace App\Entity;

use App\Repository\AccountTempRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountTempRepository::class)]
class AccountTemp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $indice = null;

    #[ORM\Column(length: 255)]
    private ?string $numero = null;

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
    private ?string $nationalite = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $commune = null;

    #[ORM\Column(length: 255)]
    private ?string $quartier = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $date_emission_piece = null;

    #[ORM\Column(length: 255)]
    private ?string $date_expiration_piece = null;

    #[ORM\Column(length: 255)]
    private ?string $file_photo = null;

    #[ORM\Column(length: 255)]
    private ?string $file_cni = null;

    #[ORM\ManyToOne(inversedBy: 'accountTemps')]
    private ?Account $Account = null;

    #[ORM\Column(length: 255)]
    private ?string $pieceNumber = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndice(): ?string
    {
        return $this->indice;
    }

    public function setIndice(string $indice): static
    {
        $this->indice = $indice;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): static
    {
        $this->numero = $numero;

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

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): static
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDateEmissionPiece(): ?string
    {
        return $this->date_emission_piece;
    }

    public function setDateEmissionPiece(string $date_emission_piece): static
    {
        $this->date_emission_piece = $date_emission_piece;

        return $this;
    }

    public function getDateExpirationPiece(): ?string
    {
        return $this->date_expiration_piece;
    }

    public function setDateExpirationPiece(string $date_expiration_piece): static
    {
        $this->date_expiration_piece = $date_expiration_piece;

        return $this;
    }

    public function getFilePhoto(): ?string
    {
        return $this->file_photo;
    }

    public function setFilePhoto(string $file_photo): static
    {
        $this->file_photo = $file_photo;

        return $this;
    }

    public function getFileCni(): ?string
    {
        return $this->file_cni;
    }

    public function setFileCni(string $file_cni): static
    {
        $this->file_cni = $file_cni;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->Account;
    }

    public function setAccount(?Account $Account): static
    {
        $this->Account = $Account;

        return $this;
    }

    public function getPieceNumber(): ?string
    {
        return $this->pieceNumber;
    }

    public function setPieceNumber(string $pieceNumber): static
    {
        $this->pieceNumber = $pieceNumber;

        return $this;
    }
}
