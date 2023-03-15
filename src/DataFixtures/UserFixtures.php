<?php

namespace App\DataFixtures;


use Faker\Factory;
use App\Entity\User;

use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordEncoder)
    {
    }


    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


        $admin = new User();
        $admin->setEmail('admin@dwwm.fr');
        $admin->setNom('Toto');
        $admin->setPrenom('Tata');
        $admin->setAdresse('12 rue toto');
        $admin->setVille('Caen');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'admin'));
        $admin->setDateNaissance($faker->dateTime);
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);



        for ($i = 1; $i <= 5; $i++) {

            $client = new User();
            $client->setEmail($faker->email);
            $client->setNom($faker->lastName);
            $client->setPrenom($faker->firstName);
            $client->setAdresse($faker->streetAddress);
            $client->setVille($faker->city);
            $client->setPassword($this->passwordEncoder->hashPassword($client, 'secret'));
            $client->setRoles(['ROLE_CLIENT']);
            $client->setDateNaissance($faker->dateTime);
            $manager->persist($client);
        }


        $manager->flush();
    }
}
