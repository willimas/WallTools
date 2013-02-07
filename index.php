<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
require 'wall/tools/cookie.php';
require 'wall/tools/crypt.php';
require 'wall/tools/iniParser.php';
require 'wall/tools/logger.php';
require 'wall/tools/various.php';

use \Wall\Tools\Cookie;
use \Wall\Tools\Crypt;
use \Wall\Tools\IniParser;
use Wall\Tools\Logger;
use Wall\Tools\Various;

//LOGGER
$Logger = new Logger(); 

$Logger->write("INFO","Using Cookie"); 

//COOKIE
Cookie::set('teste', 'teste', Cookie::Session); 

$cookieInfo = Cookie::get("teste");

//Crypt
$item = Crypt::encrypt($cookieInfo);
$itemDecrypt = Crypt::decrypt($item);

//INI PARSER
$iniCfg = new IniParser("config/config.ini"); 

$iniCfg->set("Data","version", "2.0");
$iniCfg->save("config/novo_config.ini");


$Logger->write("ERROR","Error no Log"); 
$Logger->write("INFO","Terminado item de log"); 

?>
<html>
<head>
	<title>Examples</title>
</head>
<body>
<h2>Tools</h2>
<p>Ini Parser [Data][version]: <?php echo $cfgInfo = $iniCfg->get("Data","version");?></p>
<p>Cookie: <?php echo Cookie::get("teste");?></p>
<p>Cookie and Encrypt: <?php echo Crypt::encrypt($cookieInfo);?></p>
<p>Decrypt: <?php echo Crypt::decrypt($item) ?></p>
<p>Gen Password: <?php echo Various::GeneratePassword(8); ?></p>
</boby>
</html>