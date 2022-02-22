<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance", uniqueConstraints={@ORM\UniqueConstraint(name="employe_id", columns={"employe_id"}), @ORM\UniqueConstraint(name="machine_id", columns={"machine_id"}), @ORM\UniqueConstraint(name="prestataire_id", columns={"prestataire_id"})})
 * @ORM\Entity
 */
class Maintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_maintenance", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMaintenance;

    /**
     * @var string
     *
     * @ORM\Column(name="num_machine", type="string", length=255, nullable=false)
     */
    private $numMachine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="verification_jour", type="datetime", nullable=false)
     */
    private $verificationJour;

    /**
     * @var string
     *
     * @ORM\Column(name="etat_releve", type="string", length=255, nullable=false)
     */
    private $etatReleve;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=false)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="action_menee", type="text", length=65535, nullable=false)
     */
    private $actionMenee;

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
     * @var \Prestataire
     *
     * @ORM\ManyToOne(targetEntity="Prestataire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prestataire_id", referencedColumnName="id_prestataire")
     * })
     */
    private $prestataire;

    /**
     * @var \Employes
     *
     * @ORM\ManyToOne(targetEntity="Employes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employe_id", referencedColumnName="id_employe")
     * })
     */
    private $employe;

    public function getIdMaintenance(): ?int
    {
        return $this->idMaintenance;
    }

    public function getNumMachine(): ?string
    {
        return $this->numMachine;
    }

    public function setNumMachine(string $numMachine): self
    {
        $this->numMachine = $numMachine;

        return $this;
    }

    public function getVerificationJour(): ?\DateTimeInterface
    {
        return $this->verificationJour;
    }

    public function setVerificationJour(\DateTimeInterface $verificationJour): self
    {
        $this->verificationJour = $verificationJour;

        return $this;
    }

    public function getEtatReleve(): ?string
    {
        return $this->etatReleve;
    }

    public function setEtatReleve(string $etatReleve): self
    {
        $this->etatReleve = $etatReleve;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getActionMenee(): ?string
    {
        return $this->actionMenee;
    }

    public function setActionMenee(string $actionMenee): self
    {
        $this->actionMenee = $actionMenee;

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

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): self
    {
        $this->prestataire = $prestataire;

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
