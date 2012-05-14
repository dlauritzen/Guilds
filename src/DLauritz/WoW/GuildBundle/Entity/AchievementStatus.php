<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\AchievementStatus
 */
class AchievementStatus
{
    /**
     * @var integer $id
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}