<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 * @UniqueEntity(fields={"code"}, message="le code doit etre unique")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEnv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEnv;

    /**
     * @ORM\Column(type="integer")
     */
    private $telEnv;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 1,
     *      max = 3000000,
     *      minMessage = "You must be at least {{ limit }}cm tall to enter",
     *      maxMessage = "You cannot be taller than {{ limit }}cm to enter"
     * )
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseEnv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typePieceEnv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnv;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomBenef;

    /**
     * @ORM\Column(type="integer")
     */
    private $telBenef;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomBenef;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     * @Assert\Range(
     *      min = 1000000000000,
     *      max = 2999299999999,
     *      minMessage = "numero de piece non valide",
     *      maxMessage = "numero de piece non valide"
     * )
     */
    private $cniBenef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxe;

    /**
     * @ORM\Column(type="integer")
     */
    private $commissionPropre;

    /**
     * @ORM\Column(type="integer")
     */
    private $commissionEnv;

    /**
     * @ORM\Column(type="integer")
     */
    private $commissionRet;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteEnv;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="transactions")
     */
    private $compteRet;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typePieceBenef;

    /**
     * @ORM\Column(type="bigint")
     * @Assert\Range(
     *      min = 1000000000000,
     *      max = 2999299999999,
     *      minMessage = "numero de piece non valide",
     *      maxMessage = "numero de piece non valide"
     * )
     */
    private $cniEnv;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactionss")
     */
    private $userRet;


    private $typeRetrait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getPrenomEnv(): ?string
    {
        return $this->prenomEnv;
    }

    public function setPrenomEnv(string $prenomEnv): self
    {
        $this->prenomEnv = $prenomEnv;

        return $this;
    }

    public function getNomEnv(): ?string
    {
        return $this->nomEnv;
    }

    public function setNomEnv(string $nomEnv): self
    {
        $this->nomEnv = $nomEnv;

        return $this;
    }

    public function getTelEnv(): ?int
    {
        return $this->telEnv;
    }

    public function setTelEnv(int $telEnv): self
    {
        $this->telEnv = $telEnv;

        return $this;
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

    public function getAdresseEnv(): ?string
    {
        return $this->adresseEnv;
    }

    public function setAdresseEnv(string $adresseEnv): self
    {
        $this->adresseEnv = $adresseEnv;

        return $this;
    }

    public function getTypePieceEnv(): ?string
    {
        return $this->typePieceEnv;
    }

    public function setTypePieceEnv(string $typePieceEnv): self
    {
        $this->typePieceEnv = $typePieceEnv;

        return $this;
    }

    public function getDateEnv(): ?\DateTimeInterface
    {
        return $this->dateEnv;
    }

    public function setDateEnv(\DateTimeInterface $dateEnv): self
    {
        $this->dateEnv = $dateEnv;

        return $this;
    }

   

    public function getNomBenef(): ?string
    {
        return $this->nomBenef;
    }

    public function setNomBenef(string $nomBenef): self
    {
        $this->nomBenef = $nomBenef;

        return $this;
    }

    public function getTelBenef(): ?int
    {
        return $this->telBenef;
    }

    public function setTelBenef(int $telBenef): self
    {
        $this->telBenef = $telBenef;

        return $this;
    }

    public function getDateRet(): ?\DateTimeInterface
    {
        return $this->dateRet;
    }

    public function setDateRet(?\DateTimeInterface $dateRet): self
    {
        $this->dateRet = $dateRet;

        return $this;
    }

    public function getPrenomBenef(): ?string
    {
        return $this->prenomBenef;
    }

    public function setPrenomBenef(string $prenomBenef): self
    {
        $this->prenomBenef = $prenomBenef;

        return $this;
    }

    public function getCniBenef(): ?int
    {
        return $this->cniBenef;
    }

    public function setCniBenef(?int $cniBenef): self
    {
        $this->cniBenef = $cniBenef;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTaxe(): ?int
    {
        return $this->taxe;
    }

    public function setTaxe(int $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }

    public function getCommissionPropre(): ?int
    {
        return $this->commissionPropre;
    }

    public function setCommissionPropre(int $commissionPropre): self
    {
        $this->commissionPropre = $commissionPropre;

        return $this;
    }

    public function getCommissionEnv(): ?int
    {
        return $this->commissionEnv;
    }

    public function setCommissionEnv(int $commissionEnv): self
    {
        $this->commissionEnv = $commissionEnv;

        return $this;
    }

    public function getCommissionRet(): ?int
    {
        return $this->commissionRet;
    }

    public function setCommissionRet(int $commissionRet): self
    {
        $this->commissionRet = $commissionRet;

        return $this;
    }

    public function getCompteEnv(): ?Compte
    {
        return $this->compteEnv;
    }

    public function setCompteEnv(?Compte $compteEnv): self
    {
        $this->compteEnv = $compteEnv;

        return $this;
    }

    public function getCompteRet(): ?Compte
    {
        return $this->compteRet;
    }

    public function setCompteRet(?Compte $compteRet): self
    {
        $this->compteRet = $compteRet;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getTypePieceBenef(): ?string
    {
        return $this->typePieceBenef;
    }

    public function setTypePieceBenef(?string $typePieceBenef): self
    {
        $this->typePieceBenef = $typePieceBenef;

        return $this;
    }

    public function getCniEnv(): ?int
    {
        return $this->cniEnv;
    }

    public function setCniEnv(int $cniEnv): self
    {
        $this->cniEnv = $cniEnv;

        return $this;
    }

    public function getUserRet(): ?User
    {
        return $this->userRet;
    }

    public function setUserRet(?User $userRet): self
    {
        $this->userRet = $userRet;

        return $this;
    }

    public function getTypeRetrait(): ?string
    {
        return $this->typeRetrait;
    }

    public function setTypeRetrait(string $typeRetrait): self
    {
        $this->typeRetrait = $typeRetrait;

        return $this;
    }
}
