<?php

	/**
	* DBaseMapperMysql
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:44
	*/
	
	final class DBaseMapperMysql extends DBaseMapper implements DBaseMapperI{		
	
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		/**
		* Return set names
		* @return string
		* @throws DBaseMapperException
		*/
		public function showSetNames(){
			try{
				return "SET NAMES ".$this->DBaseDriver->getCharset();
			}
			catch(DBaseDriverException $e){
				throw new DBaseMapperException("");
			}
		}
		
		/**
		* Return tables list
		* @return DBaseRecord
		* @throws DBaseMapperException
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
				throw new DBaseMapperException("Undefined database");
			}
		}
		
		/**
		* Return columns list
		* @return DBaseRecord
		* @throws DBaseMapperException
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
				throw new DBaseMapperException("Undefined database/table");
			}
		}
		
		/**
		* Return create table
		* @return string
		* @throws DBaseMapperException
		*/
		public function showCreateTable($dbName, $tableName){
			try{
				$result = $this->DBaseDriver->singleRow("SHOW CREATE TABLE `".$this->DBaseDriver->escape($dbName)."`.`".$this->DBaseDriver->escape($tableName)."`");
				
				return $result[1];
			}
			catch(DBaseDriverException $e){
				throw new DBaseMapperException("Undefined database/table");
			}
		}
		
		/**
		* Return drop table
		* @return string
		*/
		public function showDropTable($tableName){
			return "DROP TABLE IF EXISTS `".$tableName."`";
		}
		
		public function getDelimiter(){
			return ";";
		}
		
	};
