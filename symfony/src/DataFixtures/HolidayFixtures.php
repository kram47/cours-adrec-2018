<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Holiday;

class HolidayFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $locationList = [
            "bali",
            "berlin",
            "pouetoustan",
            "festival",
            "à la maison",
            "chez la famille",
            "au ski",
            "corse",
            "mont saint michel",
            "estonie",
            "riga",
            "babarville"
        ];

        for ($i = 0 ; $i < 20 ; $i++) {

            $holiday = new Holiday();
            $holiday->setDuration(random_int(1, 100))
                    ->setLocation($locationList[random_int(0, count($locationList) - 1)])
                    ->setPeopleCount(random_int(1, 30));

            $manager->persist($holiday);

        }

        $manager->flush();
    }
}
