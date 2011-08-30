<?php

	/**
	* DBaseInterfaces
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			26.8.2011 21:45
	*/

	interface DBaseDriverI{
		public function __construct(Array $config);
		
		public function singleRow($sql);
		public function singleColumn($sql);
		public function query($sql);
		
		public function nextResult();
		public function clearResult();
		
		public function escape($string);	
		
		public function showTables($dbName);
		public function showColumns($dbName, $tableName);
		
		public function showCreateTable($dbName, $tableName);
	};
