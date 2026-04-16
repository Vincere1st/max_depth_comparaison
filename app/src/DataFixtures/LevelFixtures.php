<?php

namespace App\DataFixtures;

use App\Entity\Level1;
use App\Entity\Level2;
use App\Entity\Level3;
use App\Entity\Level4;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LevelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Niveau 4 : Le plus profond (la feuille)
        $lvl4 = new Level4();
        $lvl4->name = "Niveau 4 (La cible)";
        $manager->persist($lvl4);

        // Niveau 3
        $lvl3 = new Level3();
        $lvl3->name = "Niveau 3";
        $lvl3->level4 = $lvl4;
        $manager->persist($lvl3);

        // Niveau 2
        $lvl2 = new Level2();
        $lvl2->name = "Niveau 2";
        $lvl2->level3 = $lvl3;
        $manager->persist($lvl2);

        // Niveau 1 : La racine (l'objet que vous allez sérialiser)
        $lvl1 = new Level1();
        $lvl1->name = "Niveau 1 (Racine)";
        $lvl1->level2 = $lvl2;
        $manager->persist($lvl1);

        $manager->flush();
    }
}