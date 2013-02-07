<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
require 'wall/tools/cookie.php';
require 'wall/tools/crypt.php';

use \Wall\Tools\Cookie;
use \Wall\Tools\Crypt;

Cookie::set('teste', 'teste', Cookie::Session); 
Cookie::set('teste', 'teste', 86400); 

$item = Crypt::encrypt("Meu Teste");
echo $item;
echo "<br />";
echo Crypt::decrypt($item);
echo "<br />";
echo Cookie::Get("teste");

?>