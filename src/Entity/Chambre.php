<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomChambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroChambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreLits;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChambre(): ?string
    {
        return $this->nomChambre;
    }

    public function setNomChambre(string $nomChambre): self
    {
        $this->nomChambre = $nomChambre;

        return $this;
    }

    public function getNumeroChambre(): ?int
    {
        return $this->numeroChambre;
    }

    public function setNumeroChambre(int $numeroChambre): self
    {
        $this->numeroChambre = $numeroChambre;

        return $this;
    }

    public function getNombreLits(): ?int
    {
        return $this->nombreLits;
    }

    public function setNombreLits(int $nombreLits): self
    {
        $this->nombreLits = $nombreLits;

        return $this;
    }
}
