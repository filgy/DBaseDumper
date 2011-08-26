<?php

	class DBaseRecord implements ArrayAccess, Countable, Iterator{
		
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
		
		public function offsetExists($offset){
			return isset($this->values[$offset]);
		}
		
		public function offsetGet($offset){
			return isset($this->values[$offset]) ? $this->values[$offset] : NULL;
		}
		
		public function offsetSet($offset, $value){
			if($offset == "")
				$this->values[] = $value;
			else
				$this->values[$offset] = $value;
		}
		
		public function offsetUnset($offset){
			unset($this->values[$offset]);
		}
		
		public function rewind(){
			reset($this->values);
		}
		
		public function current(){
			return current($this->values);
		}
		
		public function key(){
			return key($this->values);
		}
		
		public function next(){
			return next($this->values);
		}

		public function valid(){
			return $this->current() !== false;
		}

		public function count(){
			return count($this->values);
		}
		
	};
