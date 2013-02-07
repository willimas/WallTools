<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Tools {
  	class Various
  	{
		static function GeneratePassword($len =6, $allowedchars = false)
		{
			if ($allowedchars === false)
			    $allowedchars = 'abcdefghijklmnopqrstuvwxyz01234567890';
			$retval = '';
			$maxidx = strlen($allowedchars)-1;
			for ($i = 0; $i < $len; $i++)
			{
				$retval .= $allowedchars[rand(0,$maxidx)];
			}
			
			return $retval;
		}
	}
}
?>