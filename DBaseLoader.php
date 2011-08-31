<?php

	class DBaseLoader{
		
		public static $loader = NULL;
		private static $paths = Array("./", "./drivers/", "./mappers/");
		
		public function __construct(){
			spl_autoload_register(Array($this, "load"));
		}
		
		public static function init(){
			if(self::$loader === NULL)
				self::$loader = new self();
				
			return self::$loader;
		}
		
		public function load($className){
			if(preg_match("/Exception/", $className))
				$className = "DBaseExceptions";
			
			foreach(self::$paths as $path){
				if(file_exists($path.$className.".php")){
					require $path.$className.".php";
					return true;
				}
			}
			return false;
		}
	};
