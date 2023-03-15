<?php

namespace App\DataFixtures;

use App\Entity\Actualite;
use Faker\Factory;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActualiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
   
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 5; $i++) {

        $actualite = new Actualite();
        $actualite->setNom($faker->word());
        $actualite->setDescription($faker->paragraph());
        $actualite->setImg($faker->word() . '.jpeg');
        $manager->persist($actualite);

        }
        $manager->flush();
    }
}

