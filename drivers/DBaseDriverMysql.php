<?php

	/**
	* DBaseDriverMysql
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:35
	*/

	final class DBaseDriverMysql extends DBaseDriver implements DBaseDriverI{
		
		public function __construct(Array $config){
			if(!extension_loaded("mysql"))
				throw new DBaseDriverException("Can't load mysql extension");

			parent::__construct($config);
		}
		
		/**
		* Get result - one row
		* @return Array
		*/
		public function singleRow($sql){
			return mysql_fetch_row($this->query($sql, FALSE));
		}
		
		/**
		* Get result - one column
		* @return string
		*/
		public function singleColumn($sql){
			return mysql_result($this->query($sql, FALSE), 0);
		}
		
		/**
		* Execute query
		* @return mysql_resource
		* @throws DBaseDriverException
		*/
		public function query($sql, $store = TRUE){
			var_dump($sql);			
			$result = mysql_query($sql, $this->getConnection());
			
			if(!$result)
				throw new DBaseDriverException("Cannot execute query");

			return ($store)? $this->resultset = $result : $result;
		}
		
		/**
		* Returns next result from resultset
		* @return DBaseRecord, bool
		* @throws DBaseDriverException
		*/
		public function nextResult(){
			if($this->resultset === NULL)
				throw new DBaseDriverException("Invalid resultset");
				
			if(($row = mysql_fetch_array($this->resultset)) === FALSE)
				return FALSE;
			else
				return new DBaseRecord($row);
		}
		
		/**
		* Clear resultset
		*/
		public function clearResult(){
			if($this->resultset !== NULL)
				unset($this->resultset);
			
			$this->resultset = NULL;
		}
		
		/**
		* Return escaped string
		* @return string
		*/
		public function escape($string){
			return mysql_real_escape_string($string, $this->getConnection());
		}
		
		/**
		* Return client encoding
		* @return string
		*/
		public function getCharset(){
			return mysql_client_encoding($this->getConnection());
		}

		/**
		* Create singleton handler
		* @return mysql_resource
		* @throws DBaseDriverException
		*/
		private function getConnection(){
			if($this->handler === NULL){
				$this->handler = @mysql_connect($this->config['hostname'], $this->config['username'], $this->config['password']);
					
				if(!@mysql_query("SET NAMES ".((isset($this->config['charset']))? $this->config['charset'] : "utf8"), $this->handler))
					throw new DBaseDriverException("Can't set charset");
			}
				
			if(!$this->handler)
				throw new DBaseDriverException("Can't connect to database server");
				
			return $this->handler;
		}
	};
