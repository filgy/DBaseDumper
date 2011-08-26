<?php

	class DBaseRecord{
		
		private $values = Array();
		
		public function __construct(Array $values = Array()){
			$this->values = $values;
		}
		
		public function __destruct(){
			unset($this->values);
		}
		
		public function __set($key, $val){
			$this->values[$key] = $val;
		}
		
		public function __get($key){
			if(isset($this->values[$key]))
				return $this->values[$key];
				
			return NULL;
		}
		
	};
