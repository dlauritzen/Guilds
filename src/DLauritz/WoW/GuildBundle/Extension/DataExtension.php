<?php
namespace DLauritz\WoW\GuildBundle\Extension;

use DLauritz\WoW\Utilities\Settings;
use DLauritz\WoW\Utilities\APIUtil;
use DLauritz\WoW\Utilities\JSONUtil;

class DataExtension extends \Twig_Extension
{

  protected $model;

  public function __construct(\DLauritz\WoW\Model $model) {
    $this->model = $model;
  }

  public function getGlobals() {
    return array(
		 'guild' => Settings::guild,
		 'realm' => Settings::realm
		 );
  }

  public function getFilters() {
    return array(
		 'race' => new \Twig_Filter_Method($this, 'getRaceFromID'),
		 'class' => new \Twig_Filter_Method($this, 'getClassFromID'),
		 'faction' => new \Twig_Filter_Method($this, 'getFactionFromID'),
		 'gender' => new \Twig_Filter_Method($this, 'getGenderFromID'),
		 'rank' => new \Twig_Filter_Method($this, 'getGuildRankFromID'),
		 'classIcon' => new \Twig_Filter_Method($this, 'getClassIconFromID'),
		 'raceIcon' => new \Twig_Filter_Method($this, 'getRaceIconFromID'),

		 'wowdate' => new \Twig_Filter_Method($this, 'getWoWFormattedDate'),
		 'relative' => new \Twig_Filter_Method($this, 'getRelativeDate'),

		 'itemInfo' => new \Twig_Filter_Method($this, 'getItemInfoFromID'),
		 'characterModel' => new \Twig_Filter_Method($this, 'getCharacterFromName'),
		 'guildModel' => new \Twig_Filter_Method($this, 'getGuildFromName'),

		 'icon' => new \Twig_Filter_Method($this, 'getIconFromPath'),
		 'avatar' => new \Twig_Filter_Method($this, 'getAvatarFromPath'),
		 'slug' => new \Twig_Filter_Method($this, 'getURLSlug'),

		 'itemLink' => new \Twig_Filter_Method($this, 'getLinkForItem'),
		 'characterLink' => new \Twig_Filter_Method($this, 'getLinkForCharacter')
		 );
  }

  public function getName() {
    return 'wowdata_extension';
  }

  private function getModel() {
    return $this->model;
  }

  public function getRaceFromID($id) {
    if (array_key_exists($id, Settings::$races)) {
      return Settings::$races[$id];
    } else {
      return 'Unknown Race: ' . $id;
    }
  }

  public function getRaceIconFromID($id, $gender, $size = 18) {
    $race = strtolower(str_replace(' ', '-', $this->getRaceFromID($id)));
    $imgUrl = Settings::iconBase . '/' . $size . '/race_' . $race . '_' . strtolower($gender) . '.jpg';
    return $imgUrl;
  }

  public function getClassFromID($id) {
    if (array_key_exists($id, Settings::$classes)) {
      return Settings::$classes[$id];
    } else {
      return 'Unknown Class: ' . $id;
    }
  }

  public function getClassIconFromID($id, $size = 18) {
    $class = strtolower($this->getClassFromID($id));
    $class = str_replace(' ', '-', $class);
    $imgUrl = Settings::iconBase . '/' . $size . '/class_' . $class . '.jpg';
    return $imgUrl;
  }

  public function getFactionFromID($id) {
    if ($id == 0)
      return 'Alliance';
    else
      return 'Horde';
  }

  public function getGenderFromID($id) {
    if ($id == 0)
      return 'Male';
    else
      return 'Female';
  }

  public function getGuildRankFromID($id, $guild) {
    if (array_key_exists($guild, Settings::$guildRanks)) {
      $ranks = Settings::$guildRanks[$guild];
      if (array_key_exists($id, $ranks)) {
	return $ranks[$id];
      }
    }
    return 'Rank: ' . $id;
  }

  public function getAvatarFromPath($path) {
    return Settings::thumbBase . '/' . $path;
  }

  public function getIconFromPath($path, $size = 18) {
    return Settings::iconBase . '/' . $size . '/' . $path . '.jpg';
  }

  public function getURLSlug($text) {
    return strtolower(str_replace(' ','-',$text));
  }

  public function getWoWFormattedDate($datetime) {
    //    $secs = $timestamp / 1000; // since it comes in milliseconds
    //    return date('D, d F Y h:i:s A T', $secs);
    return $datetime->format('D, d F Y h:i:s A T');
  }

  public function getRelativeDate($then) {
    $now = $this->getModel()->getCurrentDateTime();
    $diff = $now->diff($then);

    $seconds = $diff->format('%s');
    $minutes = $diff->format('%i');
    $hours = $diff->format('%h');
    $days = $diff->format('%a');
    $weeks = $days / 7;

    $ret = "";

    if ($days == 0) {
      if ($hours == 0) {
	if ($minutes == 0) {
	  $ret .= $seconds . " seconds";
	} else {
	  $ret .= $minutes . " minutes";
	}
      } else {
	$ret .= $hours . " hours";
      }
    } else if ($days < 7) {
      $ret .= $days . " days";
    } else if ($weeks <= 3) {
      $ret .= $weeks . " weeks";
    } else if ($months < 2) {
      $ret .= $months . " months";
    } else {
      return $this->getWoWFormattedDate($then);
    }

    return $ret . " ago";
  }

  public function getItemInfoFromID($id) {
    return $this->getModel()->getItem($id);
  }

  public function getCharacterFromName($name) {
    $realm = Settings::realm;
    return $this->getModel()->getCharacter($realm, $name);
  }

  public function getGuildFromName($name) {
    $realm = Settings::realm;
    return $this->getModel()->getGuild($realm, $name);
  }

  public function getLinkForItem($id) {
    return "http://us.battle.net/wow/en/item/" . $id;
  }

  public function getLinkForCharacter($name) {
    $realm = Settings::realm;
    return "http://us.battle.net/wow/en/character/" . rawurlencode($realm) . "/" . rawurlencode($name) . "/";
  }

  function plural($num) {
    if ($num != 1)
      return "s";
  }
  
  function getRelativeTime($diff, $timestamp) {
    if ($diff<60)
      return $diff . " second" . $this->plural($diff) . " ago";

    $diff = round($diff/60);
    if ($diff<60)
      return $diff . " minute" . $this->plural($diff) . " ago";

    $diff = round($diff/60);
    if ($diff<24)
      return $diff . " hour" . $this->plural($diff) . " ago";

    $diff = round($diff/24);
    if ($diff<7)
      return $diff . " day" . $this->plural($diff) . " ago";

    $diff = round($diff/7);
    if ($diff<4)
      return $diff . " week" . $this->plural($diff) . " ago";

    return date("F j, Y", $timestamp);
  }
  
}