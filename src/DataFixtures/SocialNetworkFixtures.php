<?php

namespace App\DataFixtures;

use App\Entity\SocialNetwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialNetworkFixtures extends Fixture
{
    const SOCIALNETWORK = [
        [
            'name' => 'linkedin',
            'link' => 'https://www.linkedin.com/in/thomasluminic/',
            'icon' => 'linkiedin.png',
        ],
        [
            'name' => 'GitHub',
            'link' => 'https://github.com/thomasluminic',
            'icon' => 'github.png',
        ],
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::SOCIALNETWORK as $socialNetwork) {
            $newSocialNetwork = new SocialNetwork();
            $newSocialNetwork->setName($socialNetwork['name'])
                ->setLink($socialNetwork['link'])
                ->setIcon($socialNetwork['icon']);
            $manager->persist($newSocialNetwork);
        }

        $manager->flush();
    }
}
