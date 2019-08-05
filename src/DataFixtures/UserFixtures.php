<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('ibou@ibou.com');
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$c8U65WvKEIyObxCq+FNX1w$W/VCzIYblEgU2XRwMVn2UQrHVSElREHlpfJ3D2fFYkw');
        $user->setRoles(['ROLE_AdminWari']);
        $user->setCompte('WARI');
        $user->setProprietaire('WARI');
        $user->setImageName("null");
        $user->setNombreConnexion(0);
        $user->setStatus('Actif');
        $user->setUpdatedAt(new \Datetime());

        $manager->persist($user);
        $manager->flush();
    }
}
