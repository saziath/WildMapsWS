<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransportRepository")
 */
class Transport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\position", cascade={"persist", "remove"})
     */
    private $idD;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\position", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idA;

    /**
     * @ORM\Column(type="float")
     */
    private $frais;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdD(): ?position
    {
        return $this->idD;
    }

    public function setIdD(?position $idD): self
    {
        $this->idD = $idD;

        return $this;
    }

    public function getIdA(): ?position
    {
        return $this->idA;
    }

    public function setIdA(position $idA): self
    {
        $this->idA = $idA;

        return $this;
    }

    public function getFrais(): ?float
    {
        return $this->frais;
    }

    public function setFrais(float $frais): self
    {
        $this->frais = $frais;

        return $this;
    }
}
