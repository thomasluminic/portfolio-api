<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    const FORMATIONS = [
        [
          'name' => 'WebForce3',
          'society' => 'Webforce3',
          'location' => 'Bordeaux',
          'dateStart' => '2018-09-01',
          'dateEnd' => '2019-01-07',
          'qualification' => 'Technique d\'intégration/développement web',
        ],
        [
            'name' => 'Wild Code School',
            'society' => 'Wild Code School',
            'location' => 'Bordeaux',
            'dateStart' => '2020-03-01',
            'dateEnd' => '2020-05-01',
            'qualification' => 'Technique d\'intégration/développement web',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::FORMATIONS as $formation) {
            $newFormation = new Formation();
            $newFormation->setName($formation['name'])
                ->setSociety($formation['society'])
                ->setLocation($formation['location'])
                ->setDateStart(new \DateTime($formation['dateStart']))
                ->setDateEnd(new \DateTime($formation['dateEnd']))
                ->setQualification($formation['qualification']);

            $manager->persist($newFormation);
        }
        $manager->flush();
    }
}
