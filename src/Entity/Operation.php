<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operations")
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="beneficiaire_operation")
     */
    private $beneficiaire;

    /**
     * @ORM\ManyToOne(targetEntity=Typeoperation::class, inversedBy="operations")
     */
    private $typeoperation;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    public function getBeneficiaire(): ?Compte
    {
        return $this->beneficiaire;
    }

    public function setBeneficiaire(?Compte $beneficiaire): self
    {
        $this->beneficiaire = $beneficiaire;

        return $this;
    }

    public function getTypeoperation(): ?Typeoperation
    {
        return $this->typeoperation;
    }

    public function setTypeoperation(?Typeoperation $typeoperation): self
    {
        $this->typeoperation = $typeoperation;

        return $this;
    }

   
}
