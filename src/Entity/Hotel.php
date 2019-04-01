<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HotelRepository")
 */
class Hotel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prixParNuit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriprtion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\position", inversedBy="IdH")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idP;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixParNuit(): ?float
    {
        return $this->prixParNuit;
    }

    public function setPrixParNuit(float $prixParNuit): self
    {
        $this->prixParNuit = $prixParNuit;

        return $this;
    }

    public function getDescriprtion(): ?string
    {
        return $this->descriprtion;
    }

    public function setDescriprtion(string $descriprtion): self
    {
        $this->descriprtion = $descriprtion;

        return $this;
    }

    public function getIdP(): ?position
    {
        return $this->idP;
    }

    public function setIdP(?position $idP): self
    {
        $this->idP = $idP;

        return $this;
    }
}
