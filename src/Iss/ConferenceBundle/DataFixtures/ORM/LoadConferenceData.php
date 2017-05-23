<?php

namespace Iss\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iss\ConferenceBundle\Entity\Conference;

class LoadConferenceData extends AbstractFixture implements OrderedFixtureInterface
{
    protected $container;

    public function load(ObjectManager $manager)
    {
        $conferinta = new Conference();
        $conferinta->setName('Conferinta 1');
        $conferinta->setStartDate(new \DateTime('23.05.2017 10:00:00'));
        $conferinta->setEndDate(new \DateTime('23.05.2017 22:00:00'));
        $conferinta->setDescriere('bla bla');
        $conferinta->setDomeniu('sex');
        $conferinta->setOwner($this->getReference('user-director'));

        $manager->persist($conferinta);

        $conferinta2 = new Conference();
        $conferinta2->setName('Conferinta 2');
        $conferinta2->setStartDate(new \DateTime('23.05.2017 8:00:00'));
        $conferinta2->setEndDate(new \DateTime('23.05.2017 12:00:00'));
        $conferinta2->setDescriere('<h1 style="text-align: center;"><strong>Conferinta 2</strong></h1>
<p><strong>detalii</strong></p>
<p><em><strong>etc</strong></em></p>');
        $conferinta2->setDomeniu('droguri');
        $conferinta2->setOwner($this->getReference('user-director'));

        $manager->persist($conferinta2);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}