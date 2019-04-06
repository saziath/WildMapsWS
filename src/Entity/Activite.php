<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 */
class Activite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\position", inversedBy="idA")
     */
    private $idP;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Itinairaire", inversedBy="IdA")
     */
    private $IdI;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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

    public function getIdI(): ?Itinairaire
    {
        return $this->IdI;
    }

    public function setIdI(?Itinairaire $IdI): self
    {
        $this->IdI = $IdI;

        return $this;
    }
}
