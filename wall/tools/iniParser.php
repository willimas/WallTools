<?php 
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Tools {

class iniParser { 

	private $_iniFilename = ''; 
    private $_data = array(); 

    public function __construct( $filename ) 
    {
    	$this->_iniFilename = $filename; 
        if($this->_data = parse_ini_file( $filename, true ) ) { 
            return true; 
        } else { 
            return false; 
        }
    }

    /**
	* Retorna toda uma sessão
	* 
	* @param   string     $key
	* @return  array      
	* @author  William Lima
	*/
    private function getSection( $key ) 
    {	
        return $this->_data[$key]; 
    } 
     
    /**
	* Retorna um valor de uma sessão especifica
	* 
	* @param    string     $section
    * @param    string     $key
    * @return   string
    * @author   William Lima
    */
	private function getValue( $section, $key ) 
    { 
        if(!isset($this->_data[$section])) return false; 
        return $this->_data[$section][$key]; 
    } 
     
    /**
	* Retorna um valor de uma sessão especifica, ou opcionalmente 
	* o valor de um item especifico da sessao 
	*
	* @param    string     $section
    * @param    string      $key
    * @return   string
    * @author   William Lima
    */
    public function get( $section, $key=NULL ) 
    { 
        if(is_null($key)) 
        	return $this->getSection($section); 
        
        return $this->getValue($section, $key); 
    } 
     
    /**
    * Insere o Valor em toda uma sessão
    *
    * @param    string     $section
    * @param    array      $array
    * @return   bool
    * @author   William Lima
    */
    private function setSection( $section, $array ) 
    { 
        if(!is_array($array)) 
        	return false; 
        return $this->_data[$section] = $array; 
    } 
     
    /**
    * Insere o Valor em uma chave de uma sessão
    *
    * @param    string     $section
    * @param    string     $key
    * @param    string     $value
    * @return   bool
    * @author   William Lima
    */
    private function setValue( $section, $key, $value ) 
    { 
      	if( $this->_data[$section][$key] = $value ) 
       		return true; 

       	return false;
    } 
     
    /**
    * Insere o valor em uma sessão especifica, ou opcionalmente 
    * o valor em um item especifico da sessao 
    *
    * @param    string          $section
    * @param    array/string    $key
    * @param    string          $value
    * @return   bool
    * @author   William Lima
    */
    public function set( $section, $key, $value=NULL ) 
    { 
        if(is_array($key) && is_null($value)) 
        	return $this->setSection($section, $key); 

        return $this->setValue($section, $key, $value); 
    } 
     
    /**
    * Salva as alterações no ini file abertou
    * ou em um novo arquivo de configuração 
    *
    * @param    string          $filename
    * @return   bool
    * @author   William Lima
    */
    public function save( $filename = null ) 
    { 
        if( $filename == null )
        	$filename = $this->_iniFilename; 

        $SFfdescriptor = fopen( $filename, "w+" ); 
        foreach($this->_data as $section => $array){ 
            fwrite( $SFfdescriptor, "[" . $section . "]\n" ); 
            foreach( $array as $key => $value ) { 
                fwrite( $SFfdescriptor, "$key = $value\n" ); 
            } 
            fwrite( $SFfdescriptor, "\n" ); 
        } 
        fclose( $SFfdescriptor ); 
        return true; 
        
        
    }  
}
 }
?>