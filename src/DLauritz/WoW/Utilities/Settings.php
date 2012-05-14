<?php
namespace DLauritz\WoW\Utilities;

class Settings
{

  const realm = "Argent Dawn";
  const guild = "The Dojo";

  const apiBase = "http://us.battle.net/api/wow"; // The base path for API calls
  const iconBase = "http://us.media.blizzard.com/wow/icons"; // The base path for icons
  const thumbBase = "http://us.battle.net/static-render/us"; // The base path for thumbnails (e.g. avatar pictures)

  public static $guildRanks = array(
				    'Crossroads' => array(0 => 'Guild Master', 1 => 'Officer', 2 => 'Trusted'),
				    'The Dojo' => array(0 => 'Guild Master')
				    );

  // http://us.battle.net/api/wow/data/character/races
  public static $races = array(
			       1 => 'Human',
			       2 => 'Orc',
			       3 => 'Dwarf',
			       4 => 'Night Elf',
			       5 => 'Undead', // or Forsaken, if you wish
			       6 => 'Tauren',
			       7 => 'Gnome',
			       8 => 'Troll',
			       9 => 'Goblin',
			       10 => 'Blood Elf',
			       11 => 'Draenei',
			       22 => 'Worgen'
			       );

  // http://us.battle.net/api/wow/data/character/classes
  public static $classes = array(
				 1 => 'Warrior',
				 2 => 'Paladin',
				 3 => 'Hunter',
				 4 => 'Rogue',
				 5 => 'Priest',
				 6 => 'Death Knight',
				 7 => 'Shaman',
				 8 => 'Mage',
				 9 => 'Warlock',
				 11 => 'Druid'
				 );

}