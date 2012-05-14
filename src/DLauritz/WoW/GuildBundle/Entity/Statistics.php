<?php

namespace DLauritz\WoW\GuildBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\WoW\GuildBundle\Entity\Statistics
 */
class Statistics
{
    /**
     * @var string $date
     */
    private $date;

    /**
     * @var integer $api_calls
     */
    private $api_calls;

    /**
     * @var string $last_call_url
     */
    private $last_call_url;

    /**
     * @var datetime $last_call_timestamp
     */
    private $last_call_timestamp;


    /**
     * Set date
     *
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set api_calls
     *
     * @param integer $apiCalls
     */
    public function setApiCalls($apiCalls)
    {
        $this->api_calls = $apiCalls;
    }

    /**
     * Get api_calls
     *
     * @return integer 
     */
    public function getApiCalls()
    {
        return $this->api_calls;
    }

    /**
     * Set last_call_url
     *
     * @param string $lastCallUrl
     */
    public function setLastCallUrl($lastCallUrl)
    {
        $this->last_call_url = $lastCallUrl;
    }

    /**
     * Get last_call_url
     *
     * @return string 
     */
    public function getLastCallUrl()
    {
        return $this->last_call_url;
    }

    /**
     * Set last_call_timestamp
     *
     * @param datetime $lastCallTimestamp
     */
    public function setLastCallTimestamp($lastCallTimestamp)
    {
        $this->last_call_timestamp = $lastCallTimestamp;
    }

    /**
     * Get last_call_timestamp
     *
     * @return datetime 
     */
    public function getLastCallTimestamp()
    {
        return $this->last_call_timestamp;
    }
}