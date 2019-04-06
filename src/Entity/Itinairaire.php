<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItinairaireRepository")
 */
class Itinairaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\position")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Idp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activite", mappedBy="IdI")
     */
    private $IdA;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voyage", inversedBy="IdI")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdV;

    public function __construct()
    {
        $this->IdA = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdp(): ?position
    {
        return $this->Idp;
    }

    public function setIdp(?position $Idp): self
    {
        $this->Idp = $Idp;

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getIdA(): Collection
    {
        return $this->IdA;
    }

    public function addIdA(Activite $idA): self
    {
        if (!$this->IdA->contains($idA)) {
            $this->IdA[] = $idA;
            $idA->setIdI($this);
        }

        return $this;
    }

    public function removeIdA(Activite $idA): self
    {
        if ($this->IdA->contains($idA)) {
            $this->IdA->removeElement($idA);
            // set the owning side to null (unless already changed)
            if ($idA->getIdI() === $this) {
                $idA->setIdI(null);
            }
        }

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getIdV(): ?Voyage
    {
        return $this->IdV;
    }

    public function setIdV(?Voyage $IdV): self
    {
        $this->IdV = $IdV;

        return $this;
    }
}
