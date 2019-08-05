<?php
namespace App\Entity;
use Exception;
use App\Entity\User as User ;
use Symfony\Component\Security\Core\User\UserInterface ;
use Symfony\Component\Security\Core\User\UserCheckerInterface ;
class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth ( UserInterface $user )
    {
        if ( ! $user instanceof User ) {
            return ;
        }
        if ( $user->getStatus()!='Actif') {
            throw new Exception('Cet utilisateur est bloqué, veuillez contacter l\'administrateur');
        }
        
    }
    public function checkPostAuth ( UserInterface $user )
    {
        if ( ! $user instanceof User ) {
            return ;
        }
    }
}