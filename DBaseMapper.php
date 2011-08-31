<?php
	
	/**
	* DBaseMapper
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:38
	*/
	
	interface DBaseMapperI{
		public function __construct(Array $config);
		
		public function showSetNames();
		public function showTables($dbName);
		public function showColumns($dbName, $tableName);		
		public function showCreateTable($dbName, $tableName);		
		public function showDropTable($tableName);
		
		public function getDelimiter();
	};
	
	abstract class DBaseMapper{
		protected $DBaseDriver;
		
		public function __construct(Array $config){
			$driverName = "DBaseDriver".ucfirst((isset($config['extension']))? $config['extension'] : $config['driver']);

			if(!class_exists($driverName))
				throw new DBaseModelException("Undefined driver");
				
			$this->DBaseDriver = new $driverName($config);
		}
	};
