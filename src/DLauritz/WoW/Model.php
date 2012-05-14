<?php
namespace DLauritz\WoW;

use DLauritz\WoW\Utilities\Settings;
use DLauritz\WoW\Utilities\APIUtil;
use DLauritz\WoW\Utilities\JSONUtil;

use DLauritz\WoW\GuildBundle\Entity\Guild;
use DLauritz\WoW\GuildBundle\Entity\NewsEvent;
use DLauritz\WoW\GuildBundle\Entity\Character;
use DLauritz\WoW\GuildBundle\Entity\Item;
//use DLauritz\WoW\GuildBundle\Entity\AchievementStatus;
use DLauritz\WoW\GuildBundle\Entity\Statistics;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Components\Templating\Helper\Helper;

class Model
{

  protected $doctrine;
  protected $logger;

  public function __construct(\Symfony\Bundle\DoctrineBundle\Registry $doctrine, \Monolog\Logger $logger) {
    $this->doctrine = $doctrine;
    $this->logger = $logger;
  }

  public function getName() {
    return 'model';
  }

  private function getDoctrine() {
    return $this->doctrine;
  }

  private function getLogger() {
    return $this->logger;
  }

  public function getRepo($name) {
    return $this->getDoctrine()->getRepository('DLauritzWoWGuildBundle:' . $name);
  }

  public function getEM() {
    return $this->getDoctrine()->getEntityManager();
  }

  public function getLastModified($url) {
    $json = JSONUtil::getJSONFromAPI($url);
    return $this->getDateTimeFromTimestamp($json['lastModified']);
  }

  /* Model Access */

  public function getGuild($realm, $name) {
    try {
      $guild = $this->getRepo('Guild')->findOneBy(array('name' => $name, 'realm' => $realm));
    } catch (\Doctrine\ORM\NoResultException $e) {
      $guild = null;
    }

    $guild = $this->fetchAndParseGuild($realm, $name, $guild);

    return $guild;
  }

  public function getCharacter($realm, $name, $fields = array()) {
    try {
      $character = $this->getRepo('Character')->findOneBy(array('realm' => $realm, 'name' => $name));
    } catch (\Doctrine\ORM\NoResultException $e) {
      $character = null;
    }

    $character = $this->fetchAndParseCharacter($realm, $name, $character, $fields);

    return $character;
  }

  public function getItem($id) {
    $item = $this->getRepo('Item')->find($id);
    if (!$item) {
      $item = $this->fetchAndParseItem($id);
    }
    return $item;
  }

  public function getURLForAPICall($name, $params = array()) {
    switch($name) {
    case 'guild':
      return APIUtil::getGuildURL($params['realm'], $params['name'], array('members', 'news'));
    case 'character':
      return APIUtil::getCharacterURL($params['realm'], $params['name'], $params['fields']);
    case 'item':
      return APIUtil::getItemURL($params['id']);
    default:
      return null;
    }
  }

  /* Fetchers */

  private function fetchAndParseGuild($realm, $name, $ifnomod) {
    // fetch
    $url = $this->getURLForAPICall('guild', array('realm' => $realm, 'name' => $name));
    $json = $this->performAPICall($url, ($ifnomod != null ? $ifnomod->getLastModified() : null), $ifnomod);
    // $json = JSONUtil::getJSONFromAPI($url);

    if ($json === FALSE) {
      return null; // some error
    } else if ($json === $ifnomod) {
      return $ifnomod; // not modified
    }

    // else parse
    $guild = $this->parseGuildInfoFromJSON($json);
    $this->getEM()->flush();

    $characters = $json['members'];
    foreach ($characters as $character) {
      $c = $this->parseCharacterInfoFromGuildJSON($character['character'], $guild, $character['rank']);
      $guild->addCharacter($c);
    }
    $this->getEM()->flush();

    $news = $json['news'];
    foreach ($news as $entry) {
      $n = $this->parseNewsEntryFromGuildJSON($entry, $guild);
    }
    $this->getEM()->flush();

    return $guild;
  }

  private function fetchAndParseCharacter($realm, $name, $ifnomod, $fields) {
    $this->getLogger()->debug(sprintf("F&P: Character %s on %s else %s", $name, $realm, ($ifnomod == null ? "NULL" : $ifnomod->getName())));

    $url = $this->getURLForAPICall('character', array('realm' => $realm, 'name' => $name, 'fields' => $fields));
    $json = $this->performAPICall($url, ($ifnomod != null ? $ifnomod->getLastModified() : null), $ifnomod);

    if ($json === FALSE) {
      return null;
    } else if ($json === $ifnomod) {
      $this->getLogger()->debug("F&P: Character - Not modified. Returning " . ($ifnomod == null ? "NULL" : $ifnomod->getName()));
      return $ifnomod;
    }

    $character = $this->parseCharacterFromJSON($json);
    $this->getEM()->flush();

    $this->getLogger()->debug("F&P: Character - Parsed from JSON. Returning " . ($character == null ? "NULL" : $character->getName()));
    return $character;
  }

  private function fetchAndParseItem($id) {
    $url = $this->getURLForAPICall('item', array('id' => $id));
    $json = $this->performAPICall($url, null, null);

    if ($json === FALSE) {
      return null;
    }

    if (!$json['api_success']) {
      $this->getLogger()->warn("Error requesting Item " . $id . ": " . $json['reason']);
      return null;
    }

    // parse
    $item = $this->parseItemFromJSON($json);
    $this->getEM()->flush();

    return $item;
  }

  /* Time management */

  private function getDateTimeFromTimestamp($timestamp) {
    $secs = $timestamp / 1000;
    $ret = new \DateTime('now', new \DateTimeZone("UTC"));
    $ret->setTimestamp($secs);
    return $ret;
  }

  public function getCurrentDateTime() {
    return new \DateTime('now', new \DateTimeZone("UTC"));
  }

  private function getTimestampFromDateTime(\DateTime $time) {
    $time->setTimezone(new \DateTimeZone("UTC")); // make sure it's in UTC
    return $time->getTimestamp() * 1000;
  }

  /* Statistics */

  private function incrementAPICallCount($url) {
    $logger = $this->getLogger();
    $today = $this->getCurrentDateTime();
    $stat = $this->getRepo('Statistics')->find($today->format("Y-m-d"));
    if (!$stat) {
      $logger->info('No statistics for today. Creating row');
      $stat = new Statistics();
      $stat->setDate($today->format("Y-m-d"));
      $stat->setApiCalls(1);
    } else {
      $stat->setApiCalls($stat->getApiCalls() + 1);
      $logger->info(sprintf("API call count now at %d.", $stat->getApiCalls()));
    }
    
    $stat->setLastCallUrl($url);
    $stat->setLastCallTimestamp($today);

    $this->getEM()->persist($stat);
    $this->getEM()->flush();
  }

  /* Perform the API request and increment statistics */

  private function performAPICall($url, $lastModified, $ifNotModified) {
    $logger = $this->getLogger();
    // $req = new \HttpRequest($url, \HttpRequest::METH_GET);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // return body as a string
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);

    if ($lastModified != null) {
      curl_setopt($ch, CURLOPT_TIMEVALUE, $lastModified->getTimestamp());
      curl_setopt($ch, CURLOPT_TIMECONDITION, CURL_TIMECOND_IFMODSINCE);
      // $req->setOptions(array('lastmodified' => $lastModified->format('D, d M Y H:i:s T')));

      // If we get authenticated with Blizzard, we would put those headers here
    }
    
    $result = curl_exec($ch);
    $ret = null;
    if (curl_errno($ch) == 0) {
      $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      $logger->info(sprintf("URL: %s - %d", $url, $code));

      if ($code == 304) {
	// Not modified
	$ret = $ifNotModified;
      } else {
	$this->incrementAPICallCount($url);
	$ret = json_decode($result, true);
	$ret['api_success'] = ($code == 200); // if we get a 500 or 404, this'll let us know
      }
    } else {
      $logger->err(sprintf("Error requesting url %s: %s", $url, curl_error($ch)));
      $logger->err("Request: " . curl_getinfo($ch, CURLINFO_HEADER_OUT));
      $logger->err("Response: " . $result);
      $ret = FALSE;
    }

    curl_close($ch);
    return $ret;
  }

  /* Parsers */

  private function parseGuildInfoFromJSON($json) {
    $this->getLogger()->debug("Parsing guild: " . $json);

    $guild = $this->getRepo('Guild')->findOneBy(array('realm' => $json['realm'], 'name' => $json['name']));

    if (!$guild) {
      $guild = new Guild();
    }

    $guild->setName($json['name']);
    $guild->setRealm($json['realm']);
    $guild->setBattlegroup($json['battlegroup']);
    $guild->setLastModified($this->getDateTimeFromTimestamp($json['lastModified']));
    $guild->setLevel($json['level']);
    $guild->setSide($json['side']);
    $guild->setAchievementPoints($json['achievementPoints']);
    $guild->setEmblemIcon($json['emblem']['icon']);
    $guild->setEmblemIconColor($json['emblem']['iconColor']);
    $guild->setEmblemBorder($json['emblem']['border']);
    $guild->setEmblemBorderColor($json['emblem']['borderColor']);
    $guild->setEmblemBackgroundColor($json['emblem']['backgroundColor']);

    $this->getEM()->persist($guild);

    return $guild;
  }

  private function parseCharacterInfoFromGuildJSON($json, $guild, $rank) {
    $this->getLogger()->debug("Parsing guild character: " . json_encode($json));

    $character = $this->getRepo('Character')->findOneBy(array('name' => $json['name'], 'realm' => $json['realm']));
    if (!$character) {
      $character = new Character();
      $character->setFullyLoaded(false);
    } else if ($character->getLastModified() < $guild->getLastModified()) {
      $character->setFullyLoaded(false);
    }

    $character->setName($json['name']);
    $character->setRealm($json['realm']);
    $character->setBattlegroup($json['battlegroup']);
    $character->setClass($json['class']);
    $character->setRace($json['race']);
    $character->setGender($json['gender']);
    $character->setLevel($json['level']);
    $character->setAchievementPoints($json['achievementPoints']);
    $character->setThumbnail($json['thumbnail']);

    $character->setGuild($guild);
    $character->setGuildRank($rank);

    $this->getEM()->persist($character);

    return $character;
  }

  private function parseNewsEntryFromGuildJSON($json, $guild) {
    $this->getLogger()->debug("Parsing news entry: " . json_encode($json));

    $stamp = $this->getDateTimeFromTimestamp($json['timestamp']);
    $character = $this->getCharacter($guild->getRealm(), $json['character']);

    $this->getLogger()->debug("Timestamp: " . $stamp->format('r') . "; Character: " . ($character == null ? "NULL" : $character->getName()));

    $event = $this->getRepo('NewsEvent')->findOneBy(array('timestamp' => $stamp,
							  'type' => $json['type'],
							  'character' => $character->getId()
							  ));
    if (!$event) {
      $event = new NewsEvent();
      $event->setType($json['type']);
      $event->setTimestamp($stamp);
      $event->setCharacter($character);
      $event->setGuild($character->getGuild());
      
      // Remove what we've already taken from the json and set the rest as "details"
      $sub = array_diff($json, array('timestamp' => $json['timestamp'], 'character' => $json['character'], 'type' => $json['type']));
      $event->setDetails(json_encode($sub));
      
      $this->getEM()->persist($event);
    }
    
    return $event;
  }

  private function parseCharacterFromJSON($json) {
    $this->getLogger()->debug("Parsing character: " . json_encode($json));

    $character = $this->getRepo('Character')->findOneBy(array('name' => $json['name'], 'realm' => $json['realm']));
    if (!$character) {
      $this->getLogger()->notice('First time seeing character ' . $json['name'] . ' on ' . $json['realm']);
      $character = new Character();
    }

    // minimum fields
    $character->setName($json['name']);
    $character->setRealm($json['realm']);
    $character->setBattlegroup($json['battlegroup']);
    $character->setClass($json['class']);
    $character->setGender($json['gender']);
    $character->setLevel($json['level']);
    $character->setAchievementPoints($json['achievementPoints']);
    $character->setThumbnail($json['thumbnail']);
    $character->setLastModified($this->getDateTimeFromTimestamp($json['lastModified']));

    // Possible things to parse, depending on what the JSON has
    // guild
    // stats 
    // activity feed
    // talents
    // items (equipment)
    // reputation
    // titles
    // professions (including all known recipes)
    // appearance (face, features, hair, etc...)
    // companions
    // mounts
    // pets
    // achievements
    // progression (raid)
    // pvp
    // quests

    $character->setFullyLoaded(true);

    $this->getEM()->persist($character);

    return $character;
  }

  private function parseItemFromJSON($json) {
    // This is a little different because we don't expect updates (there's no "last modified")
    // so we only reach this method for items we have not yet seen before
    $this->getLogger()->debug("Parsing Item from JSON: " . json_encode($json));

    $item = new Item();

    $item->setId($json['id']);
    $item->setName($json['name']);
    $item->setDescription($json['description']);
    // $item->setDisenchantingSkillRank($json['disenchantingSkillRank']);
    $item->setIcon($json['icon']);
    // $item->setStackable($json['stackable']);
    $item->setItemBind($json['itemBind']);
    // bonusStats
    // itemSpells
    $item->setBuyPrice($json['buyPrice']);
    $item->setItemClass($json['itemClass']);
    $item->setItemSubClass($json['itemSubClass']);
    // $item->setContainerSlots($json['containerSlots']);
    // if (array_key_exists('weaponInfo', $json)) {
    //   $item->setDamageMin($json['weaponInfo']['damage']['min']);
    //   $item->setDamageMax($json['weaponInfo']['damage']['max']);
    //   $item->setSpeed($json['weaponInfo']['weaponSpeed']);
    //   $item->setDps($json['weaponInfo']['dps']);
    // }
    // $item->setInventoryType($json['inventoryType']);
    // $item->setEquippable($json['equippable']);
    $item->setItemLevel($json['itemLevel']);
    // $item->setMaxCount($json['maxCount']);
    // $item->setMaxDurability($json['maxDurability']);
    // $item->setMinFactionId($json['minFactionId']);
    // $item->setMinReputation($json['minReputation']);
    $item->setQuality($json['quality']);
    $item->setSellPrice($json['sellPrice']);
    // $item->setRequiredSkill($json['requiredSkill']);
    $item->setRequiredLevel($json['requiredLevel']);
    // $item->setRequiredSkillRank($json['requiredSkillRank']);
    // itemSource
    // $item->setBaseArmor($json['baseArmor']);
    // $item->setHasSockets($json['hasSockets']);
    $item->setIsAuctionable($json['isAuctionable']);
    // $item->setArmor($json['armor']);
    $item->setDisplayInfoId($json['displayInfoId']);

    $this->getEM()->persist($item);

    return $item;
  }

}