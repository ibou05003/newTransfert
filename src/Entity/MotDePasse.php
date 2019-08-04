<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class MotDePasse
{

    /**
     * @var string
     * @Assert\EqualTo(propertyPath="plainPasswordConfirm",message="veuillez saisir les memes mots de passe")
     */
    private $plainPassword;

    /**
     * @var string
     * @Assert\EqualTo(propertyPath="plainPassword",message="veuillez saisir les memes mots de passe")
     */
    private $plainPasswordConfirm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getPlainPasswordConfirm(): ?string
    {
        return $this->plainPasswordConfirm;
    }

    public function setPlainPasswordConfirm(?string $plainPasswordConfirm): self
    {
        $this->plainPasswordConfirm = $plainPasswordConfirm;

        return $this;
    }
}
