<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('test@mail.ru');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'12345'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user1 = new User();
        $user1->setEmail('test1@mail.ru');
        $user1->setPassword($this->passwordEncoder->encodePassword($user,'12345'));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);
        $manager->flush();
    }
}
