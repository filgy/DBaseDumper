<?php

	/**
	* DBaseDumper
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			30.8.2011 18:19
	*/

	class DBaseDumper{
		
		private $DBaseModel = NULL;
		
		public function __construct(Array $config){
			$modelName = "DBaseModel".ucfirst($config['driver']);
			
			if(!class_exists($modelName))
				throw new DBaseException("Undefined driver");
			
			$this->DBaseModel = new $modelName($config);
		}
		
		public function dump($dbName){
			$tables = $this->DBaseModel->showTables($dbName);		

			foreach($tables as $table)
				$this->dumpTable($dbName, $table);
		}
		
		public function dumpTable($dbName, $tableName){
			$columns = $this->DBaseModel->showColumns($dbName, $tableName);
			
			foreach($columns as $column){
				var_dump($column);
			}
			
		}
	
	};
