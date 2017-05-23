<?php

namespace Iss\ConferenceBundle\Entity;

/**
 * Presentation
 */
class Presentation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $concept;


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
     * Set title
     *
     * @param string $title
     *
     * @return Presentation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Presentation
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set concept
     *
     * @param string $concept
     *
     * @return Presentation
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;

        return $this;
    }

    /**
     * Get concept
     *
     * @return string
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * @var integer
     */
    private $duration;


    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Presentation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * @var \Iss\ConferenceBundle\Entity\Conference
     */
    private $conference;

    /**
     * @var \Iss\ConferenceBundle\Entity\User
     */
    private $owner;


    /**
     * Set conference
     *
     * @param \Iss\ConferenceBundle\Entity\Conference $conference
     *
     * @return Presentation
     */
    public function setConference(\Iss\ConferenceBundle\Entity\Conference $conference = null)
    {
        $this->conference = $conference;

        return $this;
    }

    /**
     * Get conference
     *
     * @return \Iss\ConferenceBundle\Entity\Conference
     */
    public function getConference()
    {
        return $this->conference;
    }

    /**
     * Set owner
     *
     * @param \Iss\ConferenceBundle\Entity\User $owner
     *
     * @return Presentation
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
}
