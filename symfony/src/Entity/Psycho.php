<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PsychoRepository")
 */
class Psycho
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GrumpyPuppy", inversedBy="psycho")
     */
    private $grumpyPuppy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getGrumpyPuppy(): ?GrumpyPuppy
    {
        return $this->grumpyPuppy;
    }

    public function setGrumpyPuppy(?GrumpyPuppy $grumpyPuppy): self
    {
        $this->grumpyPuppy = $grumpyPuppy;

        return $this;
    }
}
