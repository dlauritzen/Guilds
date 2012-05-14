<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\Item
 */
class Item
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var string $icon
     */
    private $icon;

    /**
     * @var integer $item_level
     */
    private $item_level;

    /**
     * @var integer $item_class
     */
    private $item_class;

    /**
     * @var integer $item_sub_class
     */
    private $item_sub_class;

    /**
     * @var integer $quality
     */
    private $quality;

    /**
     * @var integer $item_bind
     */
    private $item_bind;

    /**
     * @var integer $buy_price
     */
    private $buy_price;

    /**
     * @var integer $sell_price
     */
    private $sell_price;

    /**
     * @var integer $damage_min
     */
    private $damage_min;

    /**
     * @var integer $damage_max
     */
    private $damage_max;

    /**
     * @var float $speed
     */
    private $speed;

    /**
     * @var float $dps
     */
    private $dps;

    /**
     * @var integer $inventory_type
     */
    private $inventory_type;

    /**
     * @var boolean $equippable
     */
    private $equippable;

    /**
     * @var integer $stackable
     */
    private $stackable;

    /**
     * @var integer $container_slots
     */
    private $container_slots;

    /**
     * @var integer $disenchanging_kill_rank
     */
    private $disenchanging_kill_rank;

    /**
     * @var integer $max_count
     */
    private $max_count;

    /**
     * @var integer $max_durability
     */
    private $max_durability;

    /**
     * @var integer $min_faction_id
     */
    private $min_faction_id;

    /**
     * @var integer $min_repuation
     */
    private $min_repuation;

    /**
     * @var integer $required_skill
     */
    private $required_skill;

    /**
     * @var integer $required_level
     */
    private $required_level;

    /**
     * @var integer $required_skill_rank
     */
    private $required_skill_rank;

    /**
     * @var integer $base_armor
     */
    private $base_armor;

    /**
     * @var boolean $has_sockets
     */
    private $has_sockets;

    /**
     * @var boolean $is_auctionable
     */
    private $is_auctionable;

    /**
     * @var integer $armor
     */
    private $armor;

    /**
     * @var integer $display_info_id
     */
    private $display_info_id;


    /**
     * Set id
     *
     * @param bigint $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return bigint 
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
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set icon
     *
     * @param string $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set item_level
     *
     * @param integer $itemLevel
     */
    public function setItemLevel($itemLevel)
    {
        $this->item_level = $itemLevel;
    }

    /**
     * Get item_level
     *
     * @return integer 
     */
    public function getItemLevel()
    {
        return $this->item_level;
    }

    /**
     * Set item_class
     *
     * @param integer $itemClass
     */
    public function setItemClass($itemClass)
    {
        $this->item_class = $itemClass;
    }

    /**
     * Get item_class
     *
     * @return integer 
     */
    public function getItemClass()
    {
        return $this->item_class;
    }

    /**
     * Set item_sub_class
     *
     * @param integer $itemSubClass
     */
    public function setItemSubClass($itemSubClass)
    {
        $this->item_sub_class = $itemSubClass;
    }

    /**
     * Get item_sub_class
     *
     * @return integer 
     */
    public function getItemSubClass()
    {
        return $this->item_sub_class;
    }

    /**
     * Set quality
     *
     * @param integer $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    /**
     * Get quality
     *
     * @return integer 
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set item_bind
     *
     * @param integer $itemBind
     */
    public function setItemBind($itemBind)
    {
        $this->item_bind = $itemBind;
    }

    /**
     * Get item_bind
     *
     * @return integer 
     */
    public function getItemBind()
    {
        return $this->item_bind;
    }

    /**
     * Set buy_price
     *
     * @param integer $buyPrice
     */
    public function setBuyPrice($buyPrice)
    {
        $this->buy_price = $buyPrice;
    }

    /**
     * Get buy_price
     *
     * @return integer 
     */
    public function getBuyPrice()
    {
        return $this->buy_price;
    }

    /**
     * Set sell_price
     *
     * @param integer $sellPrice
     */
    public function setSellPrice($sellPrice)
    {
        $this->sell_price = $sellPrice;
    }

    /**
     * Get sell_price
     *
     * @return integer 
     */
    public function getSellPrice()
    {
        return $this->sell_price;
    }

    /**
     * Set damage_min
     *
     * @param integer $damageMin
     */
    public function setDamageMin($damageMin)
    {
        $this->damage_min = $damageMin;
    }

    /**
     * Get damage_min
     *
     * @return integer 
     */
    public function getDamageMin()
    {
        return $this->damage_min;
    }

    /**
     * Set damage_max
     *
     * @param integer $damageMax
     */
    public function setDamageMax($damageMax)
    {
        $this->damage_max = $damageMax;
    }

    /**
     * Get damage_max
     *
     * @return integer 
     */
    public function getDamageMax()
    {
        return $this->damage_max;
    }

    /**
     * Set speed
     *
     * @param float $speed
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    /**
     * Get speed
     *
     * @return float 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set dps
     *
     * @param float $dps
     */
    public function setDps($dps)
    {
        $this->dps = $dps;
    }

    /**
     * Get dps
     *
     * @return float 
     */
    public function getDps()
    {
        return $this->dps;
    }

    /**
     * Set inventory_type
     *
     * @param integer $inventoryType
     */
    public function setInventoryType($inventoryType)
    {
        $this->inventory_type = $inventoryType;
    }

    /**
     * Get inventory_type
     *
     * @return integer 
     */
    public function getInventoryType()
    {
        return $this->inventory_type;
    }

    /**
     * Set equippable
     *
     * @param boolean $equippable
     */
    public function setEquippable($equippable)
    {
        $this->equippable = $equippable;
    }

    /**
     * Get equippable
     *
     * @return boolean 
     */
    public function getEquippable()
    {
        return $this->equippable;
    }

    /**
     * Set stackable
     *
     * @param integer $stackable
     */
    public function setStackable($stackable)
    {
        $this->stackable = $stackable;
    }

    /**
     * Get stackable
     *
     * @return integer 
     */
    public function getStackable()
    {
        return $this->stackable;
    }

    /**
     * Set container_slots
     *
     * @param integer $containerSlots
     */
    public function setContainerSlots($containerSlots)
    {
        $this->container_slots = $containerSlots;
    }

    /**
     * Get container_slots
     *
     * @return integer 
     */
    public function getContainerSlots()
    {
        return $this->container_slots;
    }

    /**
     * Set disenchanging_kill_rank
     *
     * @param integer $disenchangingKillRank
     */
    public function setDisenchangingKillRank($disenchangingKillRank)
    {
        $this->disenchanging_kill_rank = $disenchangingKillRank;
    }

    /**
     * Get disenchanging_kill_rank
     *
     * @return integer 
     */
    public function getDisenchangingKillRank()
    {
        return $this->disenchanging_kill_rank;
    }

    /**
     * Set max_count
     *
     * @param integer $maxCount
     */
    public function setMaxCount($maxCount)
    {
        $this->max_count = $maxCount;
    }

    /**
     * Get max_count
     *
     * @return integer 
     */
    public function getMaxCount()
    {
        return $this->max_count;
    }

    /**
     * Set max_durability
     *
     * @param integer $maxDurability
     */
    public function setMaxDurability($maxDurability)
    {
        $this->max_durability = $maxDurability;
    }

    /**
     * Get max_durability
     *
     * @return integer 
     */
    public function getMaxDurability()
    {
        return $this->max_durability;
    }

    /**
     * Set min_faction_id
     *
     * @param integer $minFactionId
     */
    public function setMinFactionId($minFactionId)
    {
        $this->min_faction_id = $minFactionId;
    }

    /**
     * Get min_faction_id
     *
     * @return integer 
     */
    public function getMinFactionId()
    {
        return $this->min_faction_id;
    }

    /**
     * Set min_repuation
     *
     * @param integer $minRepuation
     */
    public function setMinRepuation($minRepuation)
    {
        $this->min_repuation = $minRepuation;
    }

    /**
     * Get min_repuation
     *
     * @return integer 
     */
    public function getMinRepuation()
    {
        return $this->min_repuation;
    }

    /**
     * Set required_skill
     *
     * @param integer $requiredSkill
     */
    public function setRequiredSkill($requiredSkill)
    {
        $this->required_skill = $requiredSkill;
    }

    /**
     * Get required_skill
     *
     * @return integer 
     */
    public function getRequiredSkill()
    {
        return $this->required_skill;
    }

    /**
     * Set required_level
     *
     * @param integer $requiredLevel
     */
    public function setRequiredLevel($requiredLevel)
    {
        $this->required_level = $requiredLevel;
    }

    /**
     * Get required_level
     *
     * @return integer 
     */
    public function getRequiredLevel()
    {
        return $this->required_level;
    }

    /**
     * Set required_skill_rank
     *
     * @param integer $requiredSkillRank
     */
    public function setRequiredSkillRank($requiredSkillRank)
    {
        $this->required_skill_rank = $requiredSkillRank;
    }

    /**
     * Get required_skill_rank
     *
     * @return integer 
     */
    public function getRequiredSkillRank()
    {
        return $this->required_skill_rank;
    }

    /**
     * Set base_armor
     *
     * @param integer $baseArmor
     */
    public function setBaseArmor($baseArmor)
    {
        $this->base_armor = $baseArmor;
    }

    /**
     * Get base_armor
     *
     * @return integer 
     */
    public function getBaseArmor()
    {
        return $this->base_armor;
    }

    /**
     * Set has_sockets
     *
     * @param boolean $hasSockets
     */
    public function setHasSockets($hasSockets)
    {
        $this->has_sockets = $hasSockets;
    }

    /**
     * Get has_sockets
     *
     * @return boolean 
     */
    public function getHasSockets()
    {
        return $this->has_sockets;
    }

    /**
     * Set is_auctionable
     *
     * @param boolean $isAuctionable
     */
    public function setIsAuctionable($isAuctionable)
    {
        $this->is_auctionable = $isAuctionable;
    }

    /**
     * Get is_auctionable
     *
     * @return boolean 
     */
    public function getIsAuctionable()
    {
        return $this->is_auctionable;
    }

    /**
     * Set armor
     *
     * @param integer $armor
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;
    }

    /**
     * Get armor
     *
     * @return integer 
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * Set display_info_id
     *
     * @param integer $displayInfoId
     */
    public function setDisplayInfoId($displayInfoId)
    {
        $this->display_info_id = $displayInfoId;
    }

    /**
     * Get display_info_id
     *
     * @return integer 
     */
    public function getDisplayInfoId()
    {
        return $this->display_info_id;
    }
    /**
     * @var integer $disenchanging_skill_rank
     */
    private $disenchanging_skill_rank;


    /**
     * Set disenchanging_skill_rank
     *
     * @param integer $disenchangingSkillRank
     */
    public function setDisenchangingSkillRank($disenchangingSkillRank)
    {
        $this->disenchanging_skill_rank = $disenchangingSkillRank;
    }

    /**
     * Get disenchanging_skill_rank
     *
     * @return integer 
     */
    public function getDisenchangingSkillRank()
    {
        return $this->disenchanging_skill_rank;
    }
    /**
     * @var integer $disenchanting_skill_rank
     */
    private $disenchanting_skill_rank;


    /**
     * Set disenchanting_skill_rank
     *
     * @param integer $disenchantingSkillRank
     */
    public function setDisenchantingSkillRank($disenchantingSkillRank)
    {
        $this->disenchanting_skill_rank = $disenchantingSkillRank;
    }

    /**
     * Get disenchanting_skill_rank
     *
     * @return integer 
     */
    public function getDisenchantingSkillRank()
    {
        return $this->disenchanting_skill_rank;
    }
    /**
     * @var integer $min_reputation
     */
    private $min_reputation;


    /**
     * Set min_reputation
     *
     * @param integer $minReputation
     */
    public function setMinReputation($minReputation)
    {
        $this->min_reputation = $minReputation;
    }

    /**
     * Get min_reputation
     *
     * @return integer 
     */
    public function getMinReputation()
    {
        return $this->min_reputation;
    }
}