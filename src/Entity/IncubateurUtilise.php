<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IncubateurUtilise
 *
 * @ORM\Table(name="incubateur_utilise", uniqueConstraints={@ORM\UniqueConstraint(name="machine_id", columns={"machine_id"}), @ORM\UniqueConstraint(name="production_id", columns={"production_id"}), @ORM\UniqueConstraint(name="production_id_4", columns={"production_id"})}, indexes={@ORM\Index(name="production_id_2", columns={"production_id"}), @ORM\Index(name="production_id_3", columns={"production_id"})})
 * @ORM\Entity
 */
class IncubateurUtilise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_incubateur_utilise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIncubateurUtilise;

    /**
     * @var int
     *
     * @ORM\Column(name="production_id", type="integer", nullable=false)
     */
    private $productionId;

    /**
     * @var string
     *
     * @ORM\Column(name="num_chariot", type="string", length=255, nullable=false)
     */
    private $numChariot;

    /**
     * @var int
     *
     * @ORM\Column(name="qte_oeuf", type="integer", nullable=false)
     */
    private $qteOeuf;

    /**
     * @var \Machines
     *
     * @ORM\ManyToOne(targetEntity="Machines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="machine_id", referencedColumnName="id_machine")
     * })
     */
    private $machine;

    public function getIdIncubateurUtilise(): ?int
    {
        return $this->idIncubateurUtilise;
    }

    public function getProductionId(): ?int
    {
        return $this->productionId;
    }

    public function setProductionId(int $productionId): self
    {
        $this->productionId = $productionId;

        return $this;
    }

    public function getNumChariot(): ?string
    {
        return $this->numChariot;
    }

    public function setNumChariot(string $numChariot): self
    {
        $this->numChariot = $numChariot;

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

    public function getMachine(): ?Machines
    {
        return $this->machine;
    }

    public function setMachine(?Machines $machine): self
    {
        $this->machine = $machine;

        return $this;
    }


}
