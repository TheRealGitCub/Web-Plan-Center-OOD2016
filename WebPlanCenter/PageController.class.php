<?php

	class PageController {
		private $model;
		
		public function __construct($model) {
			$this->model = $model;
		}
		
		public function newPage($pageModel) {
			session_start();
			$_SESSION["pages"][] = $pageModel;
		}
		
	}

?>