<?php

	/**
	* DBaseModels
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			30.8.2011 18:06
	*/
	
	abstract class DBaseModel{
		protected $DBaseDriver;
		
		public function __construct(Array $config){
			$driverName = "DBaseDriver".ucfirst((isset($config['extension']))? $config['extension'] : $config['driver']);

			if(!class_exists($driverName))
				throw new DBaseModelException("Undefined driver");
				
			$this->DBaseDriver = new $driverName($config);
		}

	};
	
	final class DBaseModelMysql extends DBaseModel implements DBaseModelI{		
	
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		/**
		* Return tables list
		* @return DBaseRecord
		* @throws DBaseModelException
		*/
		public function showTables($dbName){
			try{
				$this->DBaseDriver->query("SHOW TABLES FROM `".$this->DBaseDriver->escape($dbName)."`");
				
				$records = new DBaseRecord;
				while($result = $this->DBaseDriver->nextResult())
					$records[] = $result[0];
				
				return $records;
			}
			catch(DBaseDriverException $e){
				throw new DBaseModelException("Undefined database");
			}
		}
		
		/**
		* Return columns list
		* @return DBaseRecord
		* @throws DBaseModelException
		*/
		public function showColumns($dbName, $tableName){
			try{
				$this->DBaseDriver->query("SHOW COLUMNS FROM `".$this->DBaseDriver->escape($dbName)."`.`".$this->DBaseDriver->escape($tableName)."`");
				
				$records = new DBaseRecord;
				while($result = $this->DBaseDriver->nextResult())
					$records[] = $result;
					
				return $records;
			}
			catch(DBaseDriverException $e){
				throw new DBaseModelException("Undefined database/table");
			}
		}
		
		/**
		* Return create table
		* @return string
		* @throws DBaseModelException
		*/
		public function showCreateTable($dbName, $tableName){
			try{
				$result = $this->DBaseDriver->singleRow("SHOW CREATE TABLE `".$this->DBaseDriver->escape($dbName)."`.`".$this->DBaseDriver->escape($tableName)."`");
				
				return $result[1];
			}
			catch(DBaseDriverException $e){
				throw new DBaseModelException("Undefined database/table");
			}
		}
		
	};
	
	final class DBaseModelPostgresql extends DBaseModel implements DBaseModelI{
		
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		public function showTables($dbName){
			
		}
		
		public function showColumns($dbName, $tableName){
			
		}
		
		public function showCreateTable($dbName, $tableName){
			
		}
		
	};
