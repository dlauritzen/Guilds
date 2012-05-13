<?php
namespace DLauritz\WoW\Utilities;

class JSONUtil
{

  private static $instance;

  public static function instance() {
    global $instance;
    if ($instance === null) {
      $instance = new JSONUtil();
    }
    return $instance;
  }

  public static function getJSONFromAPI($url) {
    $response = file_get_contents($url);
    $json = json_decode($response, true);
    return $json;
  }

  public static function isErrorResponse($json) {
    if ($json === null)
      return true;
    if (array_key_exists('status', $json) && $json['status'] == 'nok') {
      return true;
    }
    return false;
  }

  public static function getErrorReason($json) {
    if (array_key_exists('reason', $json))
      return $json['reason'];
    else
      return null;
  }

}