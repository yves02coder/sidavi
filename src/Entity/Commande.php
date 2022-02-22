<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", uniqueConstraints={@ORM\UniqueConstraint(name="client_id", columns={"client_id"}), @ORM\UniqueConstraint(name="employe_id", columns={"employe_id"}), @ORM\UniqueConstraint(name="production_id", columns={"production_id"})}, indexes={@ORM\Index(name="production_id_2", columns={"production_id"}), @ORM\Index(name="production_id_3", columns={"production_id"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false)
     */
    private $dateCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_poussin", type="integer", nullable=false)
     */
    private $qtePoussin;

    /**
     * @var int
     *
     * @ORM\Column(name="total_commande", type="integer", nullable=false)
     */
    private $totalCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="moyen_payement", type="string", length=255, nullable=false)
     */
    private $moyenPayement;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_commande", type="string", length=255, nullable=false)
     */
    private $etatCommande;

    /**
     * @var \Employes
     *
     * @ORM\ManyToOne(targetEntity="Employes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employe_id", referencedColumnName="id_employe")
     * })
     */
    private $employe;

    /**
     * @var \Production
     *
     * @ORM\ManyToOne(targetEntity="Production")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="production_id", referencedColumnName="id_production")
     * })
     */
    private $production;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getClientId(): ?int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): self
    {
        $this->clientId = $clientId;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getQtePoussin(): ?int
    {
        return $this->qtePoussin;
    }

    public function setQtePoussin(int $qtePoussin): self
    {
        $this->qtePoussin = $qtePoussin;

        return $this;
    }
    public function __toString(){
      return $this->etatCommande;
    }

    public function getTotalCommande(): ?int
    {
        return $this->totalCommande;
    }

    public function setTotalCommande(int $totalCommande): self
    {
        $this->totalCommande = $totalCommande;

        return $this;
    }

    public function getMoyenPayement(): ?string
    {
        return $this->moyenPayement;
    }

    public function setMoyenPayement(string $moyenPayement): self
    {
        $this->moyenPayement = $moyenPayement;

        return $this;
    }

    public function getEtatCommande(): ?string
    {
        return $this->etatCommande;
    }

    public function setEtatCommande(string $etatCommande): self
    {
        $this->etatCommande = $etatCommande;

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

    public function getProduction(): ?Production
    {
        return $this->production;
    }

    public function setProduction(?Production $production): self
    {
        $this->production = $production;

        return $this;
    }


}
