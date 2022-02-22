<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Production
 *
 * @ORM\Table(name="production", uniqueConstraints={@ORM\UniqueConstraint(name="machine_id", columns={"machine_id"}), @ORM\UniqueConstraint(name="reception_id", columns={"reception_id"}), @ORM\UniqueConstraint(name="reception_id_3", columns={"reception_id"})}, indexes={@ORM\Index(name="reception_id_2", columns={"reception_id"})})
 * @ORM\Entity
 */
class Production
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_production", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduction;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_tri", type="integer", nullable=false)
     */
    private $qteTri;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_incubee", type="integer", nullable=false)
     */
    private $qteIncubee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_incubation", type="datetime", nullable=false)
     */
    private $dateIncubation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mirage", type="datetime", nullable=false)
     */
    private $dateMirage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_mirage", type="datetime", nullable=false)
     */
    private $heureMirage;

    /**
     * @var int
     *
     * @ORM\Column(name="oeuf_clair", type="integer", nullable=false)
     */
    private $oeufClair;

    /**
     * @var int
     *
     * @ORM\Column(name="oeuf_feconde", type="integer", nullable=false)
     */
    private $oeufFeconde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_eclosion", type="datetime", nullable=false)
     */
    private $dateEclosion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_eclosion", type="datetime", nullable=false)
     */
    private $heureEclosion;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_poussin_sortie", type="integer", nullable=false)
     */
    private $qtePoussinSortie;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_poussin_vendable", type="integer", nullable=false)
     */
    private $qtePoussinVendable;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_poussin_tri", type="integer", nullable=false)
     */
    private $qtePoussinTri;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_vente", type="string", length=255, nullable=false)
     */
    private $etatVente;

    /**
     * @var \Machines
     *
     * @ORM\ManyToOne(targetEntity="Machines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="machine_id", referencedColumnName="id_machine")
     * })
     */
    private $machine;

    /**
     * @var \Reception
     *
     * @ORM\ManyToOne(targetEntity="Reception")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reception_id", referencedColumnName="id_reception")
     * })
     */
    private $reception;

    public function getIdProduction(): ?int
    {
        return $this->idProduction;
    }
    public function __toString(){
      return $this->machine;
    }

    public function getQteTri(): ?int
    {
        return $this->qteTri;
    }

    public function setQteTri(int $qteTri): self
    {
        $this->qteTri = $qteTri;

        return $this;
    }

    public function getQteIncubee(): ?int
    {
        return $this->qteIncubee;
    }

    public function setQteIncubee(int $qteIncubee): self
    {
        $this->qteIncubee = $qteIncubee;

        return $this;
    }

    public function getDateIncubation(): ?\DateTimeInterface
    {
        return $this->dateIncubation;
    }

    public function setDateIncubation(\DateTimeInterface $dateIncubation): self
    {
        $this->dateIncubation = $dateIncubation;

        return $this;
    }

    public function getDateMirage(): ?\DateTimeInterface
    {
        return $this->dateMirage;
    }

    public function setDateMirage(\DateTimeInterface $dateMirage): self
    {
        $this->dateMirage = $dateMirage;

        return $this;
    }

    public function getHeureMirage(): ?\DateTimeInterface
    {
        return $this->heureMirage;
    }

    public function setHeureMirage(\DateTimeInterface $heureMirage): self
    {
        $this->heureMirage = $heureMirage;

        return $this;
    }

    public function getOeufClair(): ?int
    {
        return $this->oeufClair;
    }

    public function setOeufClair(int $oeufClair): self
    {
        $this->oeufClair = $oeufClair;

        return $this;
    }

    public function getOeufFeconde(): ?int
    {
        return $this->oeufFeconde;
    }

    public function setOeufFeconde(int $oeufFeconde): self
    {
        $this->oeufFeconde = $oeufFeconde;

        return $this;
    }

    public function getDateEclosion(): ?\DateTimeInterface
    {
        return $this->dateEclosion;
    }

    public function setDateEclosion(\DateTimeInterface $dateEclosion): self
    {
        $this->dateEclosion = $dateEclosion;

        return $this;
    }

    public function getHeureEclosion(): ?\DateTimeInterface
    {
        return $this->heureEclosion;
    }

    public function setHeureEclosion(\DateTimeInterface $heureEclosion): self
    {
        $this->heureEclosion = $heureEclosion;

        return $this;
    }

    public function getQtePoussinSortie(): ?int
    {
        return $this->qtePoussinSortie;
    }

    public function setQtePoussinSortie(int $qtePoussinSortie): self
    {
        $this->qtePoussinSortie = $qtePoussinSortie;

        return $this;
    }

    public function getQtePoussinVendable(): ?int
    {
        return $this->qtePoussinVendable;
    }

    public function setQtePoussinVendable(int $qtePoussinVendable): self
    {
        $this->qtePoussinVendable = $qtePoussinVendable;

        return $this;
    }

    public function getQtePoussinTri(): ?int
    {
        return $this->qtePoussinTri;
    }

    public function setQtePoussinTri(int $qtePoussinTri): self
    {
        $this->qtePoussinTri = $qtePoussinTri;

        return $this;
    }

    public function getEtatVente(): ?string
    {
        return $this->etatVente;
    }

    public function setEtatVente(string $etatVente): self
    {
        $this->etatVente = $etatVente;

        return $this;
    }

    public function getMachine(): ?Machines
    {
        return $this->machine;
    }

    public function setMachine(?Machines $machine): self
    {
        $this->machine = $machine;

        return $this;
    }

    public function getReception(): ?Reception
    {
        return $this->reception;
    }

    public function setReception(?Reception $reception): self
    {
        $this->reception = $reception;

        return $this;
    }


}
