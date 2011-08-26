<?php

	/**
	* DBaseDrivers
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			26.8.2011 21:30
	*/
	
	abstract class DBaseDriver{
		protected $config = Array();
		protected $DBaseHandler = NULL;
		
		public function __construct(Array $config){
			$this->config = $config;
		}
	};
	
	final class DBaseDriverMysql extends DBaseDriver implements DBaseDriverI{
		
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		/**
		* Get result - one row
		* @return Array
		*/
		public function singleRow($sql){
			return mysql_fetch_row($this->query(sql));
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
			var_dump($sql);
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
		* Return tables list
		* @return DBaseRecord
		* @throws DBaseDriverException
		*/
		public function showTables($dbName){
			try{
				$query = $this->query("SHOW TABLES FROM `".$this->escape($dbName)."`");
				
				$records = new DBaseRecord;
				while($result = mysql_fetch_array($query))
					$records[] = $result[0];
				
				return $records;
			}
			catch(DBaseDriverException $e){
				throw new DBaseDriverException("Undefined database");
			}
		}
		
		/**
		* Return columns list
		* @return DBaseRecord
		* @throws DBaseDriverException
		*/
		public function showColumns($dbName, $tableName){
			try{
				$query = $this->query("SHOW COLUMNS FROM `".$this->escape($dbName)."`.`".$this->escape($tableName)."`");
				
				$records = new DBaseRecord;
				while($result = mysql_fetch_assoc($query))
					$records[] = $result;
					
				return $records;
			}
			catch(DBaseDriverException $e){
				throw new DBaseDriverException("Undefined database/table");
			}
		}
		
		/**
		* Create singleton DBaseHandler
		* @return mysql_resource
		* @throws DBaseDriverException
		*/
		private function getConnection(){
			if($this->DBaseHandler === NULL){
				$this->DBaseHandler = @mysql_connect($this->config['hostname'], $this->config['username'], $this->config['password']);
				
				if(!@mysql_select_db($this->config['dbname'], $this->DBaseHandler))
					throw new DBaseDriverException("Can't select database");
					
				if(!@mysql_query("SET NAMES ".((isset($this->config['charset']))? $this->config['charset'] : "utf8"), $this->DBaseHandler))
					throw new DBaseDriverException("Can't set charset");
			}
				
			if(!$this->DBaseHandler)
				throw new DBaseDriverException("Can't connect to database server");
				
			return $this->DBaseHandler;
		}
	};
	
	final class DBaseDriverMysqli extends DBaseDriver implements DBaseDriverI{
		
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
		
		public function showTables($dbName){
			
		}
		
		public function showColumns($dbName, $tableName){
			
		}
		
		private function getConnection(){
			
		}

	};
