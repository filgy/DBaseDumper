<?php

	/**
	* DBaseDrivers
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			26.8.2011 19:12
	*/
	
	abstract class DBaseDriver{
		protected $config = Array();
		protected $DBaseHandler = NULL;
		
		public function __construct(Array $config){
			$this->config = $config;
		}
	};
	
	final class DBaseDriverMySQL extends DBaseDriver implements DBaseDriverI{
		
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		public function singleRow($sql){
			
		}
		
		/**
		* Get result - one column
		* @return string
		*/
		public function singleColumn($sql){
			return mysql_result($this->query($sql), 0);
		}
		
		/**
		* Execute query
		* @return mysql_resource
		* @throws DBaseDriverException
		*/
		public function query($sql){
			$result = mysql_query($sql, $this->getConnection());
			
			if(!$result)
				throw new DBaseDriverException("Cannot execute query");
			
			return $result;
		}
		
		/**
		* Return escaped string
		* @return string
		*/
		public function escape($string){
			return mysql_real_escape_string($string, $this->getConnection());
		}
		
		/**
		* Create singleton DBaseHandler
		* @return mysql_resource
		* @throws DBaseDriverException
		*/
		private function getConnection(){
			if($this->DBaseHandler === NULL)
				$this->DBaseHandler = @mysql_connect($this->config['hostname'], $this->config['username'], $this->config['password']);
				
			if(!$this->DBaseHandler)
				throw new DBaseDriverException("Can't connect to database server");
				
			return $this->DBaseHandler;
		}
	};
	
	final class DBaseDriverMySQLi extends DBaseDriver implements DBaseDriverI{
		
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		public function singleRow($sql){
			
		}
		
		public function singleColumn($sql){
			
		}
		
		public function query($sql){
			
		}
		
		public function escape($string){
			
		}
		
		private function getConnection(){
			
		}
	};
