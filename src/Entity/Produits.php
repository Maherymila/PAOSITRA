<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NomProduits;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Abbreviation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateEntrer;

    /**
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="IdProduits")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Mouvements::class, mappedBy="Produits")
     */
    private $mouvements;


    public function __construct()
    {
        $this->mouvements = new ArrayCollection();
    }
    

    public function __toString()
    {
        return $this->getNomProduits();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduits(): ?string
    {
        return $this->NomProduits;
    }

    public function setNomProduits(?string $NomProduits): self
    {
        $this->NomProduits = $NomProduits;

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->Abbreviation;
    }

    public function setAbbreviation(?string $Abbreviation): self
    {
        $this->Abbreviation = $Abbreviation;

        return $this;
    }

    public function getDateEntrer(): ?\DateTimeInterface
    {
        return $this->DateEntrer;
    }

    public function setDateEntrer(?\DateTimeInterface $DateEntrer): self
    {
        $this->DateEntrer = $DateEntrer;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setIdProduits($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getIdProduits() === $this) {
                $category->setIdProduits(null);
            }
        }

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
            $mouvement->setProduits($this);
        }

        return $this;
    }

    public function removeMouvement(Mouvements $mouvement): self
    {
        if ($this->mouvements->removeElement($mouvement)) {
            // set the owning side to null (unless already changed)
            if ($mouvement->getProduits() === $this) {
                $mouvement->setProduits(null);
            }
        }

        return $this;
    }


}
