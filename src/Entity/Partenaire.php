<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 * @Vich\Uploadable
 * @UniqueEntity(fields={"raisonSociale"}, message="cette raison Sociale est déjà utilisée")
 * @UniqueEntity(fields={"ninea"}, message="ce NINEA est déjà utilisé")
 * @UniqueEntity(fields={"telephoneSiege"}, message="le téléphone du siege doit etre unique")
 * @UniqueEntity(fields={"telephoneRef"}, message="le téléphone du siege doit etre unique")
 * @UniqueEntity(fields={"emailSiege"}, message="cette adresse est déjà utilisée")
 * @UniqueEntity(fields={"emailPersonneRef"}, message="cette adresse est déjà utilisée")
 * @UniqueEntity(fields={"cniPersonneRef"}, message="le CNI doit etre unique")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $raisonSociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseSociale;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneSiege;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCompletPersonneRef;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "ceci'{{ value }}' n\'est pas une adresse email."
     * )
     * @Assert\Regex("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/")
     */
    private $emailPersonneRef;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "ceci'{{ value }}' n\'est pas une adresse email."
     * )
     * @Assert\Regex("/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/")
     */
    private $emailSiege;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneRef;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Compte", mappedBy="partenaire")
     */
    private $comptes;
    /**
    * NOTE: This is not a mapped field of entity metadata, just a simple property.
    * @Vich\UploadableField(mapping="users", fileNameProperty="imageName")
    * @Assert\Image(mimeTypes={"image/jpeg", "image/png"}, mimeTypesMessage="ceci n est pas une image")
    * @var File
    */
    private $imageFile;
    /**
    *
    * @var string
    */
    private $imageName;
    /**
    *
    * @var \DateTime
    */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="partenaire")
     */
    private $users;

    /**
     * @ORM\Column(type="bigint")
     */
    private $cniPersonneRef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adressePersonneRef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getAdresseSociale(): ?string
    {
        return $this->adresseSociale;
    }

    public function setAdresseSociale(string $adresseSociale): self
    {
        $this->adresseSociale = $adresseSociale;

        return $this;
    }

    public function getTelephoneSiege(): ?int
    {
        return $this->telephoneSiege;
    }

    public function setTelephoneSiege(int $telephoneSiege): self
    {
        $this->telephoneSiege = $telephoneSiege;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNomCompletPersonneRef(): ?string
    {
        return $this->nomCompletPersonneRef;
    }

    public function setNomCompletPersonneRef(string $nomCompletPersonneRef): self
    {
        $this->nomCompletPersonneRef = $nomCompletPersonneRef;

        return $this;
    }

    public function getEmailPersonneRef(): ?string
    {
        return $this->emailPersonneRef;
    }

    public function setEmailPersonneRef(string $emailPersonneRef): self
    {
        $this->emailPersonneRef = $emailPersonneRef;

        return $this;
    }

    public function getEmailSiege(): ?string
    {
        return $this->emailSiege;
    }

    public function setEmailSiege(string $emailSiege): self
    {
        $this->emailSiege = $emailSiege;

        return $this;
    }

    public function getTelephoneRef(): ?int
    {
        return $this->telephoneRef;
    }

    public function setTelephoneRef(int $telephoneRef): self
    {
        $this->telephoneRef = $telephoneRef;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setPartenaire($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getPartenaire() === $this) {
                $compte->setPartenaire(null);
            }
        }

        return $this;
    }
    /**
    * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
    * of 'UploadedFile' is injected into this setter to trigger the update. If this
    * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
    * must be able to accept an instance of 'File' as the bundle will inject one here
    * during Doctrine hydration.
    *
    * @param null | File $imageFile
    */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }


    /**
     * Get the value of imageName
     *
     * @return  string
     */ 
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set the value of imageName
     *
     * @param  string  $imageName
     *
     * @return  self
     */ 
    public function setImageName(string $imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTime
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTime  $updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPartenaire($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getPartenaire() === $this) {
                $user->setPartenaire(null);
            }
        }

        return $this;
    }

    public function getCniPersonneRef(): ?int
    {
        return $this->cniPersonneRef;
    }

    public function setCniPersonneRef(int $cniPersonneRef): self
    {
        $this->cniPersonneRef = $cniPersonneRef;

        return $this;
    }

    public function getAdressePersonneRef(): ?string
    {
        return $this->adressePersonneRef;
    }

    public function setAdressePersonneRef(string $adressePersonneRef): self
    {
        $this->adressePersonneRef = $adressePersonneRef;

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
}
