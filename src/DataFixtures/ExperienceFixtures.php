<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixtures extends Fixture
{
    const EXPERIENCE = [
        [
            'name' => 'Crook',
            'society' => 'Projet à la Wilde Code School',
            'location' => 'Bordeaux',
            'dateStart' => '2020-04-01',
            'dateEnd' => '2020-05-01',
            'content' => 'Étudiant à la Wild Code School, j\'ai dû réaliser un projet avec d\'autre camarade. 
                Pour ce dernier nous avions comme mission de réaliser un site de création d\'antisèche 
                pour développeurs qui leurs permettraient de trouver du contenu sur des points précis en un minimum de temps.
                Nous avions comme contrainte de réaliser ce projet en méthode AGILE SCRUM avec un 
                Product Owner et un Scrum Master "tournant" à la fin de chaque sprint d\'une durée d\'une semaine, 
                du côté technique nous avons utilisée un framework maison back-end avec une architecture MVC.',
        ],
        [
            'name' => 'Klickit',
            'society' => 'Klickit',
            'location' => 'Bordeaux',
            'dateStart' => '2019-06-01',
            'dateEnd' => '2019-08-01',
            'content' => 'Ce projet de plateforme e-commerce à était réaliser pour un particulier qui voulait une application
                lui permettant de vendre ces créations. J\'ai rejoins ce projet de mise à jour du site pendant le développement.' ,
        ],
        [
            'name' => 'Le journal du recruteur',
            'society' => 'Particulier',
            'location' => 'Bordeaux',
            'dateStart' => '2019-02-01',
            'dateEnd' => '2019-03-01',
            'content' => 'Le journal du recruteur est un blog ou l\'ont peut retrouver des offres d\'emploi',
        ]
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::EXPERIENCE as $experience){
            $newExperience = new Experience();
            $newExperience->setName($experience['name'])
                ->setSociety($experience['society'])
                ->setLocation($experience['location'])
                ->setDateStart(new \DateTime($experience['dateStart']))
                ->setDateEnd(new \DateTime($experience['dateEnd']))
                ->setContent($experience['content']);
            $manager->persist($newExperience);
        }
        $manager->flush();
    }
}
