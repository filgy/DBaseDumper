<?php

	/**
	* DBaseDrivers
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			30.8.2011 17:00
	*/
	
	abstract class DBaseDriver{
		protected $config = Array();
		protected $handler = NULL;
		protected $resultset = NULL;
		
		public function __construct(Array $config){
			$this->config = $config;
		}
	};
	
	

