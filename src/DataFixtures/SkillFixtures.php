<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    const SKILLS = [
        [
            'name' => 'PHP',
            'logo' => 'php.png',
        ],
        [
            'name' => 'VueJs',
            'logo' => 'vuejs.png',
        ],
        [
            'name' => 'Vuetify',
            'logo' => 'vuetify.svg',
        ],
        [
            'name' => 'Symfony',
            'logo' => 'symfony.png',
        ],
        [
            'name' => 'JavaScript',
            'logo' => 'javascript.png',
        ],
        [
            'name' => 'HTML 5',
            'logo' => 'html5.png',
        ],
        [
            'name' => 'CSS 3',
            'logo' => 'css.png',
        ],
        [
            'name' => 'SASS',
            'logo' => 'sass.png',
        ],
        [
            'name' => 'GIT',
            'logo' => 'git.png',
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::SKILLS as $skill)
        {
            $newSkill = new Skill();
            $newSkill->setName($skill['name'])
                ->setLogo($skill['logo']);

            $manager->persist($newSkill);
        }
        $manager->flush();
    }
}
