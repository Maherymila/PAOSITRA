<?php

namespace App\Entity;

use App\Repository\MouvementsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MouvementsRepository::class)
 */
class Mouvements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class, inversedBy="mouvements")
     */
    private $Produits;

    /**
     * @ORM\ManyToOne(targetEntity=Action::class, inversedBy="mouvements")
     */
    private $Action;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reference;

    /**
     * @ORM\ManyToOne(targetEntity=Agences::class, inversedBy="mouvements")
     */
    private $Agences;

    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="mouvements")
     */
    private $Administrateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantiter;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduits(): ?Produits
    {
        return $this->Produits;
    }

    public function setProduits(?Produits $Produits): self
    {
        $this->Produits = $Produits;

        return $this;
    }

    public function getAction(): ?Action
    {
        return $this->Action;
    }

    public function setAction(?Action $Action): self
    {
        $this->Action = $Action;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getAgences(): ?Agences
    {
        return $this->Agences;
    }

    public function setAgences(?Agences $Agences): self
    {
        $this->Agences = $Agences;

        return $this;
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->Administrateur;
    }

    public function setAdministrateur(?Administrateur $Administrateur): self
    {
        $this->Administrateur = $Administrateur;

        return $this;
    }

    public function getQuantiter(): ?int
    {
        return $this->Quantiter;
    }

    public function setQuantiter(int $Quantiter): self
    {
        $this->Quantiter = $Quantiter;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
