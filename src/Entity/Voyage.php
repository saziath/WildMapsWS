<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoyageRepository")
 */
class Voyage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrOfActivity;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Hotel")
     */
    private $IdH;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\itinairaire", mappedBy="IdV")
     */
    private $IdI;

    /**
     * @ORM\Column(type="float")
     */
    private $totalprice;

    public function __construct()
    {
        $this->IdH = new ArrayCollection();
        $this->IdI = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbrOfActivity(): ?int
    {
        return $this->nbrOfActivity;
    }

    public function setNbrOfActivity(int $nbrOfActivity): self
    {
        $this->nbrOfActivity = $nbrOfActivity;

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
        }

        return $this;
    }

    public function removeIdH(Hotel $idH): self
    {
        if ($this->IdH->contains($idH)) {
            $this->IdH->removeElement($idH);
        }

        return $this;
    }

    /**
     * @return Collection|itinairaire[]
     */
    public function getIdI(): Collection
    {
        return $this->IdI;
    }

    public function addIdI(itinairaire $idI): self
    {
        if (!$this->IdI->contains($idI)) {
            $this->IdI[] = $idI;
            $idI->setIdV($this);
        }

        return $this;
    }

    public function removeIdI(itinairaire $idI): self
    {
        if ($this->IdI->contains($idI)) {
            $this->IdI->removeElement($idI);
            // set the owning side to null (unless already changed)
            if ($idI->getIdV() === $this) {
                $idI->setIdV(null);
            }
        }

        return $this;
    }

    public function getTotalprice(): ?float
    {
        return $this->totalprice;
    }

    public function setTotalprice(float $totalprice): self
    {
        $this->totalprice = $totalprice;

        return $this;
    }
}
