<?php
/****************************************************** 
 * @2013 copyrights by WAL2 (www.wal2.com.br)   * 
 * Author: William de Lima Silva (will@wal2.com.br)    * 
 * Modified: 2013-02-07                               * 
 ******************************************************/ 
namespace Wall\Database{
	use PDO;

	class Database {


		private $_host;
		private $_user;
		private $_pass;
		private $_database;

		public $last_query;

		private $_connection;
		private $_magic_quotes_active;

		function __construct($host, $user, $pass, $database) {
			$this->_host = $host;
			$this->_user = $user;
			$this->_pass = $pass;
			$this->_database = $database;

			$this->open_connection();
			$this->_magic_quotes_active = get_magic_quotes_gpc();
		}

		public function open_connection() {
			$this->_connection = new PDO($this->_host, $this->_user, $this->_pass);
			$this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		public function close_connection() {
			if(isset($this->_connection)) {
				$this->_connection = null;
				unset($this->_connection);
			}
		}

		public function query($sql) {
			$this->last_query = $sql;
			$result = $this->_connection->query($sql);
			return $result;
		}

		public function exec($sql){
			$this->last_query = $sql;
			$this->_connection->exec($sql);
		}

		public function escape_value( $value ) {
			if( $this->_magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = $this->connection->quote( $value );

			return $value;
		}

		public function num_rows($result_set) {
			return $result_set->rowCount();
		}

		public function insert_id() {
			// get the last id inserted over the current db connection
			return $this->connection->lastInsertId();
		}

	}
}
?>