<?php

	/**
	* DBaseInterfaces
	*
	* @author			Filgy (filgy@sniff.cz)
	* @package			DBaseDumper (Database dumper)
	* @license			GNU/GPL v2
	* @update			26.8.2011 19:07
	*/

	interface DBaseDriverI{
		public function __construct(Array $config);
		
		public function singleRow($sql);
		public function singleColumn($sql);
		public function query($sql);
		
		public function escape($string);		
	};
