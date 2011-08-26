<?php

	interface DBaseDriverI{
		public function __construct(Array $config);
		
		public function singleRow($string);
		public function singleColumn($string);
		public function query($string);
		
		public function escape($string);		
	};
