<?php
namespace DLauritz\Wow\Utilities;

class APIUtil
{

  public static function joinFields($arr) {
    $str = "";
    foreach($arr as $field) {
      $str .= $field.",";
    }
    if (count($arr) != 0) {
      $str = substr($str, 0, strlen($str) - 1);
    }
    return $str;
  }

  public static function getGuildURL($realm, $guild, $fields = array()) {
    $url = Settings::apiBase . "/guild/" . rawurlencode($realm) . "/" . rawurlencode($guild) . "?fields=" . APIUtil::joinFields($fields);
    return $url;
  }

  public static function getItemURL($id) {
    $url = Settings::apiBase . "/item/" . $id;
    return $url;
  }

  public static function getCharacterURL($realm, $name, $fields = array()) {
    $url = Settings::apiBase . "/character/" . rawurlencode($realm) . "/" . rawurlencode($name) . "?fields=" . APIUtil::joinFields($fields);
    return $url;
  }

}