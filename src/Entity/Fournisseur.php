<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fournisseur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle_fournisseur", type="string", length=255, nullable=false)
     */
    private $libelleFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_compte_banquaire", type="string", length=255, nullable=false)
     */
    private $numeroCompteBanquaire;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_registre_commerce", type="string", length=255, nullable=false)
     */
    private $numeroRegistreCommerce;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_pdg", type="string", length=255, nullable=false)
     */
    private $nomPdg;

    /**
     * @var string
     *
     * @ORM\Column(name="type_souche", type="string", length=255, nullable=false)
     */
    private $typeSouche;

    public function getIdFournisseur(): ?int
    {
        return $this->idFournisseur;
    }
    public function __toString(): string
    {
      return $this->contact;
    }

  public function getLibelleFournisseur(): ?string
    {
        return $this->libelleFournisseur;
    }

    public function setLibelleFournisseur(string $libelleFournisseur): self
    {
        $this->libelleFournisseur = $libelleFournisseur;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getNumeroCompteBanquaire(): ?string
    {
        return $this->numeroCompteBanquaire;
    }

    public function setNumeroCompteBanquaire(string $numeroCompteBanquaire): self
    {
        $this->numeroCompteBanquaire = $numeroCompteBanquaire;

        return $this;
    }

    public function getNumeroRegistreCommerce(): ?string
    {
        return $this->numeroRegistreCommerce;
    }

    public function setNumeroRegistreCommerce(string $numeroRegistreCommerce): self
    {
        $this->numeroRegistreCommerce = $numeroRegistreCommerce;

        return $this;
    }

    public function getNomPdg(): ?string
    {
        return $this->nomPdg;
    }

    public function setNomPdg(string $nomPdg): self
    {
        $this->nomPdg = $nomPdg;

        return $this;
    }

    public function getTypeSouche(): ?string
    {
        return $this->typeSouche;
    }

    public function setTypeSouche(string $typeSouche): self
    {
        $this->typeSouche = $typeSouche;

        return $this;
    }


}
