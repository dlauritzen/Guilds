<?php
namespace DLauritz\WoW\GuildBundle\Controller;

use DLauritz\WoW\Utilities\APIUtil;
use DLauritz\WoW\Utilities\JSONUtil;
use DLauritz\WoW\Utilities\Settings;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuildController extends Controller
{

  public function rosterAction($_format) {
    $realm = Settings::realm;
    $name = Settings::guild;

    $url = APIUtil::getGuildURL($realm,$name,array('members'));
    $json = JSONUtil::getJSONFromAPI($url);

    if ($_format === "html") {
      return $this->render('DLauritzWoWGuildBundle:Guild:roster.html.twig', 
			   array('realm' => $realm, 
				 'name' => $name, 
				 'url' => $url,
				 'error' => JSONUtil::getErrorReason($json),
				 'json' => $json));
    }
  }

  public function newsAction($_format) {
    $realm = Settings::realm;
    $name = Settings::guild;

    $url = APIUtil::getGuildURL($realm, $name, array('news'));
    $json = JSONUtil::getJSONFromAPI($url);

    if ($_format == "html") {
      return $this->render('DLauritzWoWGuildBundle:Guild:news.html.twig',
			   array('realm' => $realm,
				 'name' => $name,
				 'url' => $url,
				 'error' => JSONUtil::getErrorReason($json),
				 'json' => $json));
    }
  }

}