<?php

	/**
	* DBaseMapperPostgresql
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:47
	*/

	final class DBaseMapperPostgresql extends DBaseMapper implements DBaseMapperI{
		
		public function __construct(Array $config){
			parent::__construct($config);
		}
		
		public function showSetNames(){
			
		}
		
		public function showTables($dbName){
			
		}
		
		public function showColumns($dbName, $tableName){
			
		}
		
		public function showCreateTable($dbName, $tableName){
			
		}
		
		public function showDropTable($tableName){

		}
		
		public function getDelimiter(){
			
		}
		
	};

