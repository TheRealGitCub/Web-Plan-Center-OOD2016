<?php

	class PageController {
		private $model;
		
		public function __construct($model) {
			$this -> model = $model;
		}
		
		public function newLandingPage($pageModel) {
			echo ("UNIMPLEMENTED : newLandingPage() - " . $pageModel->title . "\n");
		}
		
		public function newGalleryPage($pageModel) {
			echo ("UNIMPLEMENTED : newGalleryPage() - " . $pageModel->title . "\n");
		}
		
		public function newExternalLink($pageModel) {
			echo ("UNIMPLEMENTED : newExternalLink() - " . $pageModel->title . "\n");
		}
		
	}

?>