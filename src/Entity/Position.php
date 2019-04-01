<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PositionRepository")
 */
class Position
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hotel", mappedBy="idP", orphanRemoval=true)
     */
    private $IdH;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activite", mappedBy="idP")
     */
    private $idA;

    public function __construct()
    {
        $this->IdH = new ArrayCollection();
        $this->idA = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Hotel[]
     */
    public function getIdH(): Collection
    {
        return $this->IdH;
    }

    public function addIdH(Hotel $idH): self
    {
        if (!$this->IdH->contains($idH)) {
            $this->IdH[] = $idH;
            $idH->setIdP($this);
        }

        return $this;
    }

    public function removeIdH(Hotel $idH): self
    {
        if ($this->IdH->contains($idH)) {
            $this->IdH->removeElement($idH);
            // set the owning side to null (unless already changed)
            if ($idH->getIdP() === $this) {
                $idH->setIdP(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getIdA(): Collection
    {
        return $this->idA;
    }

    public function addIdA(Activite $idA): self
    {
        if (!$this->idA->contains($idA)) {
            $this->idA[] = $idA;
            $idA->setIdP($this);
        }

        return $this;
    }

    public function removeIdA(Activite $idA): self
    {
        if ($this->idA->contains($idA)) {
            $this->idA->removeElement($idA);
            // set the owning side to null (unless already changed)
            if ($idA->getIdP() === $this) {
                $idA->setIdP(null);
            }
        }

        return $this;
    }

}
