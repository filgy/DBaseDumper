<?php

	/**
	* DBaseDumper
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			26.8.2011 20:10
	*/

	class DBaseDumper{
		
		private $DBaseDriver = NULL;
		
		public function __construct(Array $config){
			$driver = "DBaseDriver".ucfirst($config['driver']);
			
			if(!class_exists($driver))
				throw new DBaseException("Undefined driver");
			
			$this->DBaseDriver = new $driver($config);
		}
		
		public function dump($dbName){
			$tables = $this->DBaseDriver->showTables($dbName);		

			foreach($tables as $table){

			}			
		}
		
		public function dumpTable($dbName, $tableName){
			$columns = $this->DBaseDriver->showColumns($dbName, $tableName);
			
			foreach($columns as $column){
				
			}
		}
	
	};
