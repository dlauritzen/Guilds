<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\NewsEvent
 */
class NewsEvent
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var text $details
     */
    private $details;

    /**
     * @var DLauritz\WoW\GuildBundle\Entity\Character
     */
    private $character;


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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * Set details
     *
     * @param text $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * Get details
     *
     * @return text 
     */
    public function getDetails()
    {
      return json_decode($this->details, true);
      //        return $this->details;
    }

    /**
     * Set character
     *
     * @param DLauritz\WoW\GuildBundle\Entity\Character $character
     */
    public function setCharacter(\DLauritz\WoW\GuildBundle\Entity\Character $character)
    {
        $this->character = $character;
    }

    /**
     * Get character
     *
     * @return DLauritz\WoW\GuildBundle\Entity\Character 
     */
    public function getCharacter()
    {
        return $this->character;
    }
    /**
     * @var datetime $timestamp
     */
    private $timestamp;


    /**
     * Set timestamp
     *
     * @param datetime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * Get timestamp
     *
     * @return datetime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    /**
     * @var DLauritz\WoW\GuildBundle\Entity\Guild
     */
    private $guild;


    /**
     * Set guild
     *
     * @param DLauritz\WoW\GuildBundle\Entity\Guild $guild
     */
    public function setGuild(\DLauritz\WoW\GuildBundle\Entity\Guild $guild)
    {
        $this->guild = $guild;
    }

    /**
     * Get guild
     *
     * @return DLauritz\WoW\GuildBundle\Entity\Guild 
     */
    public function getGuild()
    {
        return $this->guild;
    }
}