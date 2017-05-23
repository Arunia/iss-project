<?php

namespace Iss\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iss\ConferenceBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ionut = new User();
        $ionut->setName('Ionut Ungureanu');
        $ionut->setAfiliere('NTT Data Romania');
        $ionut->setEmail('rtl.dex@gmail.com');
        $ionut->setRole('ROLE_ADMIN');
        $this->setPassword($ionut);
        $manager->persist($ionut);
        $this->addReference('user-ionut', $ionut);

        $ramona = new User();
        $ramona->setName('Ramona Stoica');
        $ramona->setAfiliere('Grupa 332');
        $ramona->setEmail('romona.stoica@gmail.com');
        $ramona->setRole('ROLE_ADMIN');
        $this->setPassword($ramona);
        $manager->persist($ramona);
        $this->addReference('user-ramona', $ramona);

        $director = new User();
        $director->setName('Radu Trusca');
        $director->setAfiliere('Grupa 332');
        $director->setEmail('radu.trusca@gmail.com');
        $director->setRole('ROLE_DIRECTOR');
        $this->setPassword($director);
        $manager->persist($director);
        $this->addReference('user-director', $director);

        $speaker = new User();
        $speaker->setName('Paul Vertic');
        $speaker->setAfiliere('Grupa 332');
        $speaker->setEmail('paul.vertic@gmail.com');
        $speaker->setRole('ROLE_SPEAKER');
        $this->setPassword($speaker);
        $manager->persist($speaker);
        $this->addReference('user-speaker', $speaker);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

    private function setPassword($user)
    {
        // password: 1234
        $user->setPassword('$2a$05$vmDkcRNre9Nsr3dgSH/VF.3lGfrJ1vFYqsK1QrD4x71uYZToZ3C7m');
    }

}