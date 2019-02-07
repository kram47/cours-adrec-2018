<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GrumpyPuppyRepository")
 */
class GrumpyPuppy
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
    private $legs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Psycho", mappedBy="grumpyPuppy")
     */
    private $psycho;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Smelling", inversedBy="grumpyPuppies")
     */
    private $Smelling;

    public function __construct()
    {
        $this->psycho = new ArrayCollection();
        $this->Smelling = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLegs(): ?int
    {
        return $this->legs;
    }

    public function setLegs(int $legs): self
    {
        $this->legs = $legs;

        return $this;
    }

    /**
     * @return Collection|Psycho[]
     */
    public function getPsycho(): Collection
    {
        return $this->psycho;
    }

    public function addPsycho(Psycho $psycho): self
    {
        if (!$this->psycho->contains($psycho)) {
            $this->psycho[] = $psycho;
            $psycho->setGrumpyPuppy($this);
        }

        return $this;
    }

    public function removePsycho(Psycho $psycho): self
    {
        if ($this->psycho->contains($psycho)) {
            $this->psycho->removeElement($psycho);
            // set the owning side to null (unless already changed)
            if ($psycho->getGrumpyPuppy() === $this) {
                $psycho->setGrumpyPuppy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Smelling[]
     */
    public function getSmelling(): Collection
    {
        return $this->Smelling;
    }

    public function addSmelling(Smelling $smelling): self
    {
        if (!$this->Smelling->contains($smelling)) {
            $this->Smelling[] = $smelling;
        }

        return $this;
    }

    public function removeSmelling(Smelling $smelling): self
    {
        if ($this->Smelling->contains($smelling)) {
            $this->Smelling->removeElement($smelling);
        }

        return $this;
    }
}
