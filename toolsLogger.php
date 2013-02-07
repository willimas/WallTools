<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 

require 'wall/tools/logger.php';

$Logger = new Wall\Tools\Logger(); 
$Logger->write("INFO","Logger teste"); 
$Logger->write("ERROR","Error no Log"); 
$Logger->write("INFO","Terminado item de log"); 

?>