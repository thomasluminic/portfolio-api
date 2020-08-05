<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    const PROJECTS = [
        [
            'title' => 'Crook',
            'image' => 'crookScreen.png',
            'link' => 'https://www.crook.fr/',
        ],
        [
            'title' => 'A room with a view',
            'image' => 'aRoomWithAView.png',
            'link' => 'https://aroomwithaview.fr/',
        ],
        [
            'title' => 'Le journal du recruteur',
            'image' => 'LejournaldurecruteurScreen.png',
            'link' => 'https://lejournaldurecruteur.fr/',
        ],
        [
            'title' => 'Klickit',
            'image' => 'klickitScreen.png',
            'link' => 'https://klickit.fr/',
        ]
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PROJECTS as $project) {
            $newProject = new Project();
            $newProject->setTitle($project['title'])
                ->setImages($project['image'])
                ->setLink($project['link']);
            $manager->persist($newProject);
        }
        $manager->flush();
    }
}
