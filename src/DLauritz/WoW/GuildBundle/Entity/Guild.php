<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\Guild
 */
class Guild
{

    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $realm
     */
    private $realm;

    /**
     * @var datetime $last_modified
     */
    private $last_modified;

    /**
     * @var string $battlegroup
     */
    private $battlegroup;

    /**
     * @var integer $level
     */
    private $level;

    /**
     * @var integer $side
     */
    private $side;

    /**
     * @var integer $achievement_points
     */
    private $achievement_points;

    /**
     * @var integer $emblem_icon
     */
    private $emblem_icon;

    /**
     * @var string $emblem_icon_color
     */
    private $emblem_icon_color;

    /**
     * @var integer $emblem_border
     */
    private $emblem_border;

    /**
     * @var string $emblem_border_color
     */
    private $emblem_border_color;

    /**
     * @var string $emblem_background_color
     */
    private $emblem_background_color;

    /**
     * @var DLauritz\WoW\GuildBundle\Entity\Character
     */
    private $members;

    /**
     * @var DLauritz\WoW\GuildBundle\Entity\NewsEvent
     */
    private $news;

    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
    $this->news = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set last_modified
     *
     * @param datetime $lastModified
     */
    public function setLastModified($lastModified)
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
     * Set level
     *
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set side
     *
     * @param integer $side
     */
    public function setSide($side)
    {
        $this->side = $side;
    }

    /**
     * Get side
     *
     * @return integer 
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set achievement_points
     *
     * @param integer $achievementPoints
     */
    public function setAchievementPoints($achievementPoints)
    {
        $this->achievement_points = $achievementPoints;
    }

    /**
     * Get achievement_points
     *
     * @return integer 
     */
    public function getAchievementPoints()
    {
        return $this->achievement_points;
    }

    /**
     * Set emblem_icon
     *
     * @param integer $emblemIcon
     */
    public function setEmblemIcon($emblemIcon)
    {
        $this->emblem_icon = $emblemIcon;
    }

    /**
     * Get emblem_icon
     *
     * @return integer 
     */
    public function getEmblemIcon()
    {
        return $this->emblem_icon;
    }

    /**
     * Set emblem_icon_color
     *
     * @param string $emblemIconColor
     */
    public function setEmblemIconColor($emblemIconColor)
    {
        $this->emblem_icon_color = $emblemIconColor;
    }

    /**
     * Get emblem_icon_color
     *
     * @return string 
     */
    public function getEmblemIconColor()
    {
        return $this->emblem_icon_color;
    }

    /**
     * Set emblem_border
     *
     * @param integer $emblemBorder
     */
    public function setEmblemBorder($emblemBorder)
    {
        $this->emblem_border = $emblemBorder;
    }

    /**
     * Get emblem_border
     *
     * @return integer 
     */
    public function getEmblemBorder()
    {
        return $this->emblem_border;
    }

    /**
     * Set emblem_border_color
     *
     * @param string $emblemBorderColor
     */
    public function setEmblemBorderColor($emblemBorderColor)
    {
        $this->emblem_border_color = $emblemBorderColor;
    }

    /**
     * Get emblem_border_color
     *
     * @return string 
     */
    public function getEmblemBorderColor()
    {
        return $this->emblem_border_color;
    }

    /**
     * Set emblem_background_color
     *
     * @param string $emblemBackgroundColor
     */
    public function setEmblemBackgroundColor($emblemBackgroundColor)
    {
        $this->emblem_background_color = $emblemBackgroundColor;
    }

    /**
     * Get emblem_background_color
     *
     * @return string 
     */
    public function getEmblemBackgroundColor()
    {
        return $this->emblem_background_color;
    }

    /**
     * Add members
     *
     * @param DLauritz\WoW\GuildBundle\Entity\Character $members
     */
    public function addCharacter(\DLauritz\WoW\GuildBundle\Entity\Character $members)
    {
        $this->members[] = $members;
    }

    /**
     * Get members
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Add news
     *
     * @param DLauritz\WoW\GuildBundle\Entity\NewsEvent $news
     */
    public function addNewsEvent(\DLauritz\WoW\GuildBundle\Entity\NewsEvent $news)
    {
        $this->news[] = $news;
    }

    /**
     * Get news
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNews()
    {
        return $this->news;
    }
}