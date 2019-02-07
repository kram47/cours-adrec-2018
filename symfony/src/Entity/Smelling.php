<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SmellingRepository")
 */
class Smelling
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $acidity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $roughness;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GrumpyPuppy", mappedBy="Smelling")
     */
    private $grumpyPuppies;

    public function __construct()
    {
        $this->grumpyPuppies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcidity(): ?int
    {
        return $this->acidity;
    }

    public function setAcidity(?int $acidity): self
    {
        $this->acidity = $acidity;

        return $this;
    }

    public function getRoughness(): ?int
    {
        return $this->roughness;
    }

    public function setRoughness(?int $roughness): self
    {
        $this->roughness = $roughness;

        return $this;
    }

    /**
     * @return Collection|GrumpyPuppy[]
     */
    public function getGrumpyPuppies(): Collection
    {
        return $this->grumpyPuppies;
    }

    public function addGrumpyPuppy(GrumpyPuppy $grumpyPuppy): self
    {
        if (!$this->grumpyPuppies->contains($grumpyPuppy)) {
            $this->grumpyPuppies[] = $grumpyPuppy;
            $grumpyPuppy->addSmelling($this);
        }

        return $this;
    }

    public function removeGrumpyPuppy(GrumpyPuppy $grumpyPuppy): self
    {
        if ($this->grumpyPuppies->contains($grumpyPuppy)) {
            $this->grumpyPuppies->removeElement($grumpyPuppy);
            $grumpyPuppy->removeSmelling($this);
        }

        return $this;
    }
}
