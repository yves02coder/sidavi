<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souche
 *
 * @ORM\Table(name="souche")
 * @ORM\Entity
 */
class Souche
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_souche", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSouche;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    public function getIdSouche(): ?int
    {
        return $this->idSouche;
    }
    public function __toString(){
      return $this->libelle;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


}
