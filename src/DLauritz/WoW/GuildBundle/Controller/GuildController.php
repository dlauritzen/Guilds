<?php
namespace DLauritz\WoW\GuildBundle\Controller;

use DLauritz\WoW\Utilities\Settings;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuildController extends Controller
{

  public function rosterAction($_format) {
    $realm = Settings::realm;
    $name = Settings::guild;

    //    $url = APIUtil::getGuildURL($realm,$name,array('members'));
    //    $json = JSONUtil::getJSONFromAPI($url);
    $url = $this->get('model')->getURLForAPICall('guild', array('realm' => $realm, 'name' => $name));
    $guild = $this->get('model')->getGuild($realm, $name);

    if ($_format === "html") {
      return $this->render('DLauritzWoWGuildBundle:Guild:roster.html.twig', 
			   array('realm' => $realm, 
				 'name' => $name, 
				 'url' => $url,
				 'lastModified' => $guild->getLastModified(),
				 'guild' => $guild));
    }
  }

  public function newsAction($_format) {
    $realm = Settings::realm;
    $name = Settings::guild;

    //    $url = APIUtil::getGuildURL($realm, $name, array('news'));
    //    $json = JSONUtil::getJSONFromAPI($url);
    $url = $this->get('model')->getURLForAPICall('guild', array('realm' => $realm, 'name' => $name));
    $guild = $this->get('model')->getGuild($realm, $name);

    if ($_format == "html") {
      return $this->render('DLauritzWoWGuildBundle:Guild:news.html.twig',
			   array('realm' => $realm,
				 'name' => $name,
				 'url' => $url,
				 'lastModified' => $guild->getLastModified(),
				 'guild' => $guild));
    }
  }

}