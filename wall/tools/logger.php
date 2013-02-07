<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Tools {

	class Logger {

		private $fileName; 
		private $filePath; 
		private $fileMode; 
		private $file; 

		public function __construct($fileName="Wall",$filePath="logs/",$fileMode="a+",$timeZone="America/Sao_Paulo") 
	    {

	    	date_default_timezone_set($timeZone); 
		    $date = date("Ymd"); 
		    $this->fileName = $fileName.$date.".log"; 
		    $this->filePath = $filePath; 
		    $this->file = fopen($this->filePath.$this->fileName,$fileMode); 

		    fclose($this->file); 
 
	    }
  
	 	public function write($type="ERROR:",$message="",$hideInfo=false){ 

		    $this->file = fopen($this->filePath.$this->fileName,"a+"); 
		     
		    if($this->file==null){ 
		      trigger_error("Error: Não foi possivel criar ou abrir o arquivo", E_USER_ERROR); 
		    }else { 
		    	$date = date("H:i:s e"); 
		    	$ip = $_SERVER["REMOTE_ADDR"];
		    	if($hideInfo){
		      		fwrite($this->file,$type.": ".$message."\n"); 
		      	}else{
		      		fwrite($this->file,$date."\t".$ip."\t".$type.": ".$message."\n");
		      	}
		      	fclose($this->file); 
		    } 
	   	} 
	} 
}

?>