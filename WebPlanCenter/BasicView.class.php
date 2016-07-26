<?php

	class BasicView {
		private $controller;
		private $model;
		
		public function __construct($controller, $model) {
			$this -> controller = $controller;
			$this -> model = $model;
		}
		
		public function output() {
			return "<p><a href='test.php?action=clicked'>" . $this->model->string . "</a></p>";
		}
	}

?>