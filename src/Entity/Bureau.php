<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BureauRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=BureauRepository::class)
 */
class Bureau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombureau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annuaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNombureau(): ?string
    {
        return $this->nombureau;
    }

    public function setNombureau(string $nombureau): self
    {
        $this->nombureau = $nombureau;

        return $this;
    }

    public function getAnnuaire(): ?string
    {
        return $this->annuaire;
    }

    public function setAnnuaire(string $annuaire): self
    {
        $this->annuaire = $annuaire;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }
}
