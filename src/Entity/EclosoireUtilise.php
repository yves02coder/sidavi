<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EclosoireUtilise
 *
 * @ORM\Table(name="eclosoire_utilise", uniqueConstraints={@ORM\UniqueConstraint(name="machine_id", columns={"machine_id"}), @ORM\UniqueConstraint(name="production_id", columns={"production_id"})})
 * @ORM\Entity
 */
class EclosoireUtilise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_eclosoire_utilise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEclosoireUtilise;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_oeuf", type="integer", nullable=false)
     */
    private $qteOeuf;

    /**
     * @var string
     *
     * @ORM\Column(name="num_caisse", type="string", length=255, nullable=false)
     */
    private $numCaisse;

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
     * @var \Production
     *
     * @ORM\ManyToOne(targetEntity="Production")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="production_id", referencedColumnName="id_production")
     * })
     */
    private $production;

    public function getIdEclosoireUtilise(): ?int
    {
        return $this->idEclosoireUtilise;
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

    public function getNumCaisse(): ?string
    {
        return $this->numCaisse;
    }

    public function setNumCaisse(string $numCaisse): self
    {
        $this->numCaisse = $numCaisse;

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
