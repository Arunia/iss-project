<?php

namespace Iss\ConferenceBundle\Entity;

use Symfony\Component\Security\Acl\Model\DomainObjectInterface;

/**
 * Conference
 */
class Conference implements DomainObjectInterface
{
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Conference
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @var \Iss\ConferenceBundle\Entity\User
     */
    private $owner;

    /**
     * Set owner
     *
     * @param \Iss\ConferenceBundle\Entity\User $owner
     *
     * @return Conference
     */
    public function setOwner(\Iss\ConferenceBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Iss\ConferenceBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @var \DateTime
     */
    private $start_date;

    /**
     * @var \DateTime
     */
    private $end_date;

    /**
     * @var string
     */
    private $domeniu;

    /**
     * @var string
     */
    private $descriere;


    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Conference
     */
    public function setStartDate($startDate)
    {
        $this->start_date = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Conference
     */
    public function setEndDate($endDate)
    {
        $this->end_date = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Set domeniu
     *
     * @param string $domeniu
     *
     * @return Conference
     */
    public function setDomeniu($domeniu)
    {
        $this->domeniu = $domeniu;

        return $this;
    }

    /**
     * Get domeniu
     *
     * @return string
     */
    public function getDomeniu()
    {
        return $this->domeniu;
    }

    /**
     * Set descriere
     *
     * @param string $descriere
     *
     * @return Conference
     */
    public function setDescriere($descriere)
    {
        $this->descriere = $descriere;

        return $this;
    }

    /**
     * Get descriere
     *
     * @return string
     */
    public function getDescriere()
    {
        return $this->descriere;
    }

    /**
     * Returns a unique identifier for this domain object.
     *
     * @return string
     */
    public function getObjectIdentifier()
    {
        return 'conferinta_' . $this->getId();
    }
}
