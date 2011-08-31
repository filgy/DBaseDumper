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
		
		private $DBaseMapper = NULL;
		
		public function __construct(Array $config){
			$mapperName = "DBaseMapper".ucfirst($config['driver']);
			
			if(!class_exists($mapperName))
				throw new DBaseException("Undefined driver");
			
			$this->DBaseMapper = new $mapperName($config);
		}
		
		public function dump($dbName){
			$tables = $this->DBaseMapper->showTables($dbName);		

			foreach($tables as $table)
				$this->dumpTable($dbName, $table);
		}
		
		public function dumpTable($dbName, $tableName){
			$columns = $this->DBaseMapper->showColumns($dbName, $tableName);
			
			echo $this->DBaseMapper->showSetNames().$this->DBaseMapper->getDelimiter();
			echo $this->DBaseMapper->showDropTable($tableName).$this->DBaseMapper->getDelimiter();
			echo $this->DBaseMapper->showCreateTable($dbName, $tableName).$this->DBaseMapper->getDelimiter();
			
			
			
			foreach($columns as $column){
				//var_dump($column);
			}
			
		}
	
	};
