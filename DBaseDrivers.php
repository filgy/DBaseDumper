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
		
		public function singleColumn($sql){
			
		}
		
		public function query($sql){
			
		}
		
		public function escape($string){
			
		}
		
		private function getConnection(){
			
		}
	};
