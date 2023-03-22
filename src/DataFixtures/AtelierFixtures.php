<?php

namespace App\DataFixtures;

use App\Entity\Atelier;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AtelierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 5; $i++) {

        $atelier = new Atelier();
        $atelier->setNom($faker->word());
        $atelier->setDate($faker->dateTime);
        $atelier->setDescription($faker->paragraph());
        $atelier->setImage('Atelier1.jpg');
        $manager->persist($atelier);

        }

        $manager->flush();
    }
}
