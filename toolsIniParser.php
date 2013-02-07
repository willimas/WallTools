<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 

require 'wall/tools/iniParser.php';

$cfg = new Wall\Tools\IniParser("config/config.ini"); 

print_r($cfg->get("Data")); 

$cfg->set("Data","version", "2.0"); 

$cfg->save("config/novo_config.ini");

print_r($cfg->get("Data")); 

?>