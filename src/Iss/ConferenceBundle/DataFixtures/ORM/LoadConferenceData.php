<?php

namespace Iss\ConferenceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iss\ConferenceBundle\Entity\Conference;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Acl\Domain\ObjectIdentity;
use Symfony\Component\Security\Acl\Domain\RoleSecurityIdentity;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;
use Symfony\Component\Security\Acl\Permission\MaskBuilder;

class LoadConferenceData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $conferinta2->setDescriere('bla bla 2');
        $conferinta2->setDomeniu('droguri');
        $conferinta2->setOwner($this->getReference('user-director'));

        $manager->persist($conferinta2);
        $manager->flush();

        // creating the ACL
        $aclProvider = $this->container->get('security.acl.provider');
        $objectIdentity = ObjectIdentity::fromDomainObject($conferinta);
        $acl = $aclProvider->createAcl($objectIdentity);
        // retrieving the security identity of the currently logged-in user
        $securityIdentity = UserSecurityIdentity::fromAccount($this->getReference('user-director'));
        // grant owner access
        $acl->insertObjectAce($securityIdentity, MaskBuilder::MASK_OWNER);
        $aclProvider->updateAcl($acl);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}