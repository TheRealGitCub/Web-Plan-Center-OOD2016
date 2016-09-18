<?php

	class BasicController {
		private $model;
		
		public function __construct($model) {
			$this -> model = $model;
		}
		
		public function clicked() {
			$this -> model -> string = "I SAID HELLO!";
		}
	}

?>