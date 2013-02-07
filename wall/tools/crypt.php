<?php
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Tools {

	class Crypt
  	{
  		const Key = "eightkey";

		static function encrypt($str, $key = self::Key)
		{
		    $block = mcrypt_get_block_size('des', 'ecb');
		    $pad = $block - (strlen($str) % $block);
		    $str .= str_repeat(chr($pad), $pad);

		    return mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
		}

		static function decrypt($str, $key = self::Key)
		{   
		    $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);

		    $block = mcrypt_get_block_size('des', 'ecb');
		    $pad = ord($str[($len = strlen($str)) - 1]);
		    return substr($str, 0, strlen($str) - $pad);
		}
	}
}
?>