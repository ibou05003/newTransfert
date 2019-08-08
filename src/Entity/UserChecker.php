<?php
namespace App\Entity;

use Exception;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user)
    {
        if ($user->getStatus() != 'Actif') {
            throw new Exception('Cet utilisateur est bloqué, veuillez contacter l\'administrateur');
        } elseif ($user->getPartenaire()!= NULL && $user->getPartenaire()->getStatus() != 'Actif') {
            throw new Exception('Ce partenaire est bloqué, veuillez contacter le prestataire');
        }
    }
    public function checkPostAuth(UserInterface $user)
    {}
}
