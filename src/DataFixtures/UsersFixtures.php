<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
        )
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('admin@demo.fr');
        $admin->setLastname('Lac');
        $admin->setFirstname('Syl');
        $admin->setAddress('9 rue de chezmoi');
        $admin->setZipcode('66600');
        $admin->setCity('Enfer');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin,'testAdmin')
        );
        $admin->setRole(['ROLE_ADMIN']);

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');
        for($usr = 1 ; $usr<=5 ; $usr++){
            $user = new Users();
            $user->setEmail($faker->email);
            $user->setLastname($faker->lastName);
            $user->setFirstname($faker->firstName);
            $user->setAddress($faker->streetAddress);
            $user->setZipcode(str_replace(' ', '', $faker->postcode));
            $user->setCity($faker->city);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user,'secret')
            );

            $manager->persist($user);
        }

        $manager->flush();

    }
}
