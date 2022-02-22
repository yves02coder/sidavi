<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FournisseurSouche
 *
 * @ORM\Table(name="fournisseur_souche", uniqueConstraints={@ORM\UniqueConstraint(name="fournisseur_id", columns={"fournisseur_id"}), @ORM\UniqueConstraint(name="souche_id", columns={"souche_id"}), @ORM\UniqueConstraint(name="souche_id_3", columns={"souche_id"})}, indexes={@ORM\Index(name="souche_id_2", columns={"souche_id"})})
 * @ORM\Entity
 */
class FournisseurSouche
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_fourni_sche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFourniSche;

    /**
     * @var \Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="id_fournisseur")
     * })
     */
    private $fournisseur;

    /**
     * @var \Souche
     *
     * @ORM\ManyToOne(targetEntity="Souche")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="souche_id", referencedColumnName="id_souche")
     * })
     */
    private $souche;

    public function getIdFourniSche(): ?int
    {
        return $this->idFourniSche;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getSouche(): ?Souche
    {
        return $this->souche;
    }

    public function setSouche(?Souche $souche): self
    {
        $this->souche = $souche;

        return $this;
    }


}
