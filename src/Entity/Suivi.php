<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Suivi
 *
 * @ORM\Table(name="suivi", uniqueConstraints={@ORM\UniqueConstraint(name="employe_id", columns={"employe_id"}), @ORM\UniqueConstraint(name="machine_id", columns={"machine_id"})})
 * @ORM\Entity
 */
class Suivi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_suivi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSuivi;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=10, nullable=false)
     */
    private $civilite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_suivi", type="datetime", nullable=false)
     */
    private $dateSuivi;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=false)
     */
    private $fonction;

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
     * @var \Machines
     *
     * @ORM\ManyToOne(targetEntity="Machines")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="machine_id", referencedColumnName="id_machine")
     * })
     */
    private $machine;

    public function getIdSuivi(): ?int
    {
        return $this->idSuivi;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getDateSuivi(): ?\DateTimeInterface
    {
        return $this->dateSuivi;
    }

    public function setDateSuivi(\DateTimeInterface $dateSuivi): self
    {
        $this->dateSuivi = $dateSuivi;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

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
