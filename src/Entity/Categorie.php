<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdProduits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCategorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $ValeurFaciale;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    /**
     * @ORM\Column(type="integer")
     */
    private $Ordre;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prixvente;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduits(): ?Produits
    {
        return $this->IdProduits;
    }

    public function setIdProduits(?Produits $IdProduits): self
    {
        $this->IdProduits = $IdProduits;

        return $this;
    }

    public function getNomCategorie(): ?string
    {
        return $this->NomCategorie;
    }

    public function setNomCategorie(string $NomCategorie): self
    {
        $this->NomCategorie = $NomCategorie;

        return $this;
    }

    public function getValeurFaciale(): ?int
    {
        return $this->ValeurFaciale;
    }

    public function setValeurFaciale(int $ValeurFaciale): self
    {
        $this->ValeurFaciale = $ValeurFaciale;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(int $Ordre): self
    {
        $this->Ordre = $Ordre;

        return $this;
    }

    public function getPrixvente(): ?int
    {
        return $this->Prixvente;
    }

    public function setPrixvente(int $Prixvente): self
    {
        $this->Prixvente = $Prixvente;

        return $this;
    }

    
    
}
