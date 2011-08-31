<?php

	/**
	* DBaseDriver
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			31.8.2011 9:39
	*/
	
	interface DBaseDriverI{
		public function __construct(Array $config);
		
		public function singleRow($sql);
		public function singleColumn($sql);
		public function query($sql);
		
		public function nextResult();
		public function clearResult();
		
		public function escape($string);
		
		public function getCharset();
	};

	
	abstract class DBaseDriver{
		protected $config = Array();
		protected $handler = NULL;
		protected $resultset = NULL;
		
		public function __construct(Array $config){
			$this->config = $config;
		}
	};
