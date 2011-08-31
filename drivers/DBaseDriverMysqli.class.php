<?php

	/**
	* DBaseDriverMysqli
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:35
	*/

	final class DBaseDriverMysqli extends DBaseDriver implements DBaseDriverI{
		
		public function __construct(Array $config){
			if(!extension_loaded("mysqli"))
				throw new DBaseDriverException("Can't load mysqli extension");
			
			parent::__construct($config);
		}
		
		public function singleRow($sql){
			
		}
		
		public function singleColumn($sql){
			
		}
		
		public function query($sql){
			
		}
		
		public function nextResult(){
		
		}
		
		public function clearResult(){
			
		}
		
		public function escape($string){
			
		}
		
		public function getCharset(){
			
		}
		
		private function getConnection(){
			
		}

	};
