<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 *  @ApiFilter(SearchFilter::class, properties={"numcompte": "partial"})
 */
class Compte
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
    private $numagence;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $numcompte;

    /**
     * @ORM\Column(type="integer")
     */
    private $clerib;

    /**
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="client_id")
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="compte")
     */
    private $operations;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="beneficiaire")
     */
    private $beneficiaire_operation;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
        $this->beneficiaire_operation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumagence(): ?string
    {
        return $this->numagence;
    }

    public function setNumagence(string $numagence): self
    {
        $this->numagence = $numagence;

        return $this;
    }

    public function getNumcompte(): ?string
    {
        return $this->numcompte;
    }

    public function setNumcompte(string $numcompte): self
    {
        $this->numcompte = $numcompte;

        return $this;
    }

    public function getClerib(): ?int
    {
        return $this->clerib;
    }

    public function setClerib(int $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompte() === $this) {
                $operation->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getBeneficiaireOperation(): Collection
    {
        return $this->beneficiaire_operation;
    }

    public function addBeneficiaireOperation(Operation $beneficiaireOperation): self
    {
        if (!$this->beneficiaire_operation->contains($beneficiaireOperation)) {
            $this->beneficiaire_operation[] = $beneficiaireOperation;
            $beneficiaireOperation->setBeneficiaire($this);
        }

        return $this;
    }

    public function removeBeneficiaireOperation(Operation $beneficiaireOperation): self
    {
        if ($this->beneficiaire_operation->contains($beneficiaireOperation)) {
            $this->beneficiaire_operation->removeElement($beneficiaireOperation);
            // set the owning side to null (unless already changed)
            if ($beneficiaireOperation->getBeneficiaire() === $this) {
                $beneficiaireOperation->setBeneficiaire(null);
            }
        }

        return $this;
    }
}
