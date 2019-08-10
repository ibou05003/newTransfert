<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('ibou@ibou.com');
        $user->setPassword($this->encoder->encodePassword($user,'passer'));
        $user->setRoles(['ROLE_SuperAdminWari']);
        $user->setImageName("null");
        $user->setNombreConnexion(0);
        $user->setStatus('Actif');
        $user->setUpdatedAt(new \Datetime());
        $user->setNomComplet('Ibou Ndao');
        $user->setCni(175519930017);
        $user->setAdresse('Fadia');
        $user->setTelephone(778083808);
        $user->setCreatedAt(new \Datetime());
        $manager->persist($user);
        $manager->flush();
    }
}
