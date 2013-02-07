<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Tools {
  class Cookie
  {
    const Session = null;
    const OneDay = 86400;
    const SevenDays = 604800;
    const ThirtyDays = 2592000;
    const SixMonths = 15811200;
    const OneYear = 31536000;
    const Lifetime = 1893456000; // 2030-01-01 00:00:00

    static public function exists($name)
    {
      return isset($_COOKIE[$name]);
    }

    static public function isEmpty($name)
    {
      return empty($_COOKIE[$name]);
    }

    static public function get($name, $default = '')
    {
      return (isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default);
    }

    static public function set($name, $value, $expiry = self::OneYear, $path = '/', $domain = false)
    {
      $retval = false;
      if (!headers_sent())
      {
        if ($domain === false)
          $domain = $_SERVER['HTTP_HOST'];

        if (is_numeric($expiry))
          $expiry += time();
        else
          $expiry = strtotime($expiry);

        $retval = @setcookie($name, $value, $expiry, $path, $domain);
        if ($retval)
          $_COOKIE[$name] = $value;
      }
      return $retval;
    }

    static public function delete($name, $path = '/', $domain = false, $remove_from_global = false)
    {
      $retval = false;
      if (!headers_sent())
      {
        if ($domain === false)
          $domain = $_SERVER['HTTP_HOST'];
        $retval = setcookie($name, '', time() - 3600, $path, $domain);

        if ($remove_from_global)
          unset($_COOKIE[$name]);
      }
      return $retval;
    }
  }
}