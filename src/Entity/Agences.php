<?php

namespace App\Entity;

use App\Repository\AgencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgencesRepository::class)
 */
class Agences
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Centre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Responsable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DRPM;

    /**
     * @ORM\OneToMany(targetEntity=Mouvements::class, mappedBy="Agences")
     */
    private $mouvements;

    public function __construct()
    {
        $this->mouvements = new ArrayCollection();
    }

    

    public function __toString()
    {
        return $this-> getCentre();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCentre(): ?string
    {
        return $this->Centre;
    }

    public function setCentre(string $Centre): self
    {
        $this->Centre = $Centre;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getDRPM(): ?string
    {
        return $this->DRPM;
    }

    public function setDRPM(string $DRPM): self
    {
        $this->DRPM = $DRPM;

        return $this;
    }

    /**
     * @return Collection|Mouvements[]
     */
    public function getMouvements(): Collection
    {
        return $this->mouvements;
    }

    public function addMouvement(Mouvements $mouvement): self
    {
        if (!$this->mouvements->contains($mouvement)) {
            $this->mouvements[] = $mouvement;
            $mouvement->setAgences($this);
        }

        return $this;
    }

    public function removeMouvement(Mouvements $mouvement): self
    {
        if ($this->mouvements->removeElement($mouvement)) {
            // set the owning side to null (unless already changed)
            if ($mouvement->getAgences() === $this) {
                $mouvement->setAgences(null);
            }
        }

        return $this;
    }


   
}
