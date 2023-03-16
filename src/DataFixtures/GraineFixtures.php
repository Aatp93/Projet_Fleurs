<?php

namespace App\DataFixtures;

use App\Entity\Graine;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class GraineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 5; $i++) {

        $graine = new Graine();
        $graine->setNom($faker->word());
        $graine->setPoid($faker->randomFloat(1,10,15));
        $graine->setCouleur($faker->word());
        $graine->setDescription($faker->paragraph());
        $graine->setPrix($faker->randomFloat(1,20,30));
        $graine->setImg($faker->word() . '.jpeg');
        $manager->persist($graine);

        }

        $manager->flush();
    }
}
