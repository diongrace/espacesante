<?php

namespace App\Entity;

use App\Repository\HistoriqueHospitalisationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoriqueHospitalisationRepository::class)
 */
class HistoriqueHospitalisation
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
    private $patient;

    /**
     * @ORM\Column(type="date")
     */
    private $dateSortie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $medecin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hospitalisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatient(): ?string
    {
        return $this->patient;
    }

    public function setPatient(string $patient): self
    {
        $this->patient = $patient;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getMedecin(): ?string
    {
        return $this->medecin;
    }

    public function setMedecin(string $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getHospitalisation(): ?string
    {
        return $this->hospitalisation;
    }

    public function setHospitalisation(string $hospitalisation): self
    {
        $this->hospitalisation = $hospitalisation;

        return $this;
    }
}
