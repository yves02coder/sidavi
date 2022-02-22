<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reception
 *
 * @ORM\Table(name="reception", uniqueConstraints={@ORM\UniqueConstraint(name="employe_id_2", columns={"employe_id"}), @ORM\UniqueConstraint(name="fournisseur_id", columns={"fournisseur_id"})}, indexes={@ORM\Index(name="employe_id", columns={"employe_id"})})
 * @ORM\Entity
 */
class Reception
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reception", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reception", type="datetime", nullable=false)
     */
    private $dateReception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_reception", type="datetime", nullable=false)
     */
    private $heureReception;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_carton_recu", type="integer", nullable=false)
     */
    private $qteCartonRecu;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_oeuf", type="integer", nullable=false)
     */
    private $qteOeuf;

    /**
     * @var string
     *
     * @ORM\Column(name="chauffeur", type="string", length=255, nullable=false)
     */
    private $chauffeur;

    /**
     * @var string
     *
     * @ORM\Column(name="mle_vehicule", type="string", length=255, nullable=false)
     */
    private $mleVehicule;

    /**
     * @var int
     *
     * @ORM\Column(name="fournisseur_id", type="integer", nullable=false)
     */
    private $fournisseurId;

    /**
     * @var \Employes
     *
     * @ORM\ManyToOne(targetEntity="Employes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employe_id", referencedColumnName="id_employe")
     * })
     */
    private $employe;

    public function getIdReception(): ?int
    {
        return $this->idReception;
    }
    public function  __toString(){
      return $this->idReception;
    }

    public function getDateReception(): ?\DateTimeInterface
    {
        return $this->dateReception;
    }

    public function setDateReception(\DateTimeInterface $dateReception): self
    {
        $this->dateReception = $dateReception;

        return $this;
    }

    public function getHeureReception(): ?\DateTimeInterface
    {
        return $this->heureReception;
    }

    public function setHeureReception(\DateTimeInterface $heureReception): self
    {
        $this->heureReception = $heureReception;

        return $this;
    }

    public function getQteCartonRecu(): ?int
    {
        return $this->qteCartonRecu;
    }

    public function setQteCartonRecu(int $qteCartonRecu): self
    {
        $this->qteCartonRecu = $qteCartonRecu;

        return $this;
    }

    public function getQteOeuf(): ?int
    {
        return $this->qteOeuf;
    }

    public function setQteOeuf(int $qteOeuf): self
    {
        $this->qteOeuf = $qteOeuf;

        return $this;
    }

    public function getChauffeur(): ?string
    {
        return $this->chauffeur;
    }

    public function setChauffeur(string $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    public function getMleVehicule(): ?string
    {
        return $this->mleVehicule;
    }

    public function setMleVehicule(string $mleVehicule): self
    {
        $this->mleVehicule = $mleVehicule;

        return $this;
    }

    public function getFournisseurId(): ?int
    {
        return $this->fournisseurId;
    }

    public function setFournisseurId(int $fournisseurId): self
    {
        $this->fournisseurId = $fournisseurId;

        return $this;
    }

    public function getEmploye(): ?Employes
    {
        return $this->employe;
    }

    public function setEmploye(?Employes $employe): self
    {
        $this->employe = $employe;

        return $this;
    }


}
