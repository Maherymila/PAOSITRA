<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionRepository::class)
 */
class Action
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
    private $TypeAction;

    /**
     * @ORM\Column(type="date")
     */
    private $DateAction;

    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Produit;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreProduit;

    /**
     * @ORM\OneToMany(targetEntity=Mouvements::class, mappedBy="Action")
     */
    private $mouvements;

    public function __construct()
    {
        $this->mouvements = new ArrayCollection();
    }

    public function __toString()
    {
        return $this-> getTypeAction();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAction(): ?string
    {
        return $this->TypeAction;
    }

    public function setTypeAction(string $TypeAction): self
    {
        $this->TypeAction = $TypeAction;

        return $this;
    }

    public function getDateAction(): ?\DateTimeInterface
    {
        return $this->DateAction;
    }

    public function setDateAction(\DateTimeInterface $DateAction): self
    {
        $this->DateAction = $DateAction;

        return $this;
    }

    

    public function getProduit(): ?string
    {
        return $this->Produit;
    }

    public function setProduit(string $Produit): self
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getNombreProduit(): ?int
    {
        return $this->NombreProduit;
    }

    public function setNombreProduit(int $NombreProduit): self
    {
        $this->NombreProduit = $NombreProduit;

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
            $mouvement->setAction($this);
        }

        return $this;
    }

    public function removeMouvement(Mouvements $mouvement): self
    {
        if ($this->mouvements->removeElement($mouvement)) {
            // set the owning side to null (unless already changed)
            if ($mouvement->getAction() === $this) {
                $mouvement->setAction(null);
            }
        }

        return $this;
    }


}
