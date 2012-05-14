<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\Character
 */
class Character
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $last_modified
     */
    private $last_modified;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $realm
     */
    private $realm;

    /**
     * @var string $battlegroup
     */
    private $battlegroup;

    /**
     * @var smallint $class
     */
    private $class;

    /**
     * @var smallint $race
     */
    private $race;

    /**
     * @var smallint $gender
     */
    private $gender;

    /**
     * @var smallint $level
     */
    private $level;

    /**
     * @var integer $achievementPoints
     */
    private $achievementPoints;

    /**
     * @var string $thumbnail
     */
    private $thumbnail;

    /**
     * @var DLauritz\WoW\GuildBundle\Entity\Guild
     */
    private $guild;


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
     * Set last_modified
     *
     * @param datetime $lastModified
     */
    public function setLastModified(\DateTime $lastModified)
    {
        $this->last_modified = $lastModified;
    }

    /**
     * Get last_modified
     *
     * @return datetime 
     */
    public function getLastModified()
    {
        return $this->last_modified;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set realm
     *
     * @param string $realm
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;
    }

    /**
     * Get realm
     *
     * @return string 
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * Set battlegroup
     *
     * @param string $battlegroup
     */
    public function setBattlegroup($battlegroup)
    {
        $this->battlegroup = $battlegroup;
    }

    /**
     * Get battlegroup
     *
     * @return string 
     */
    public function getBattlegroup()
    {
        return $this->battlegroup;
    }

    /**
     * Set class
     *
     * @param smallint $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * Get class
     *
     * @return smallint 
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set race
     *
     * @param smallint $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * Get race
     *
     * @return smallint 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set gender
     *
     * @param smallint $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get gender
     *
     * @return smallint 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set level
     *
     * @param smallint $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return smallint 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set achievementPoints
     *
     * @param integer $achievementPoints
     */
    public function setAchievementPoints($achievementPoints)
    {
        $this->achievementPoints = $achievementPoints;
    }

    /**
     * Get achievementPoints
     *
     * @return integer 
     */
    public function getAchievementPoints()
    {
        return $this->achievementPoints;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * Get thumbnail
     *
     * @return string 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

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
    /**
     * @var boolean $fully_loaded
     */
    private $fully_loaded;


    /**
     * Set fully_loaded
     *
     * @param boolean $fullyLoaded
     */
    public function setFullyLoaded($fullyLoaded)
    {
        $this->fully_loaded = $fullyLoaded;
    }

    /**
     * Get fully_loaded
     *
     * @return boolean 
     */
    public function getFullyLoaded()
    {
        return $this->fully_loaded;
    }
    /**
     * @var smallint $guild_rank
     */
    private $guild_rank;


    /**
     * Set guild_rank
     *
     * @param smallint $guildRank
     */
    public function setGuildRank($guildRank)
    {
        $this->guild_rank = $guildRank;
    }

    /**
     * Get guild_rank
     *
     * @return smallint 
     */
    public function getGuildRank()
    {
        return $this->guild_rank;
    }
}