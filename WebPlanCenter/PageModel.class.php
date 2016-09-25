<?php

	class PageModel {
		public $title;
		public $type;
		public $children;
		public $typeName;
		public $sessionIndex;
		
		public function __construct($title, $type, $children = [], $sessionIndex) {
			$this->title = $title;
			$this->type = $type;
			$this->children = $children;
			$this->sessionIndex = $sessionIndex;
			
			switch ($this->type) {
				case PAGETYPE_LANDING:
					$this->typeName = "Landing Page";
					break;
				case PAGETYPE_GALLERY:
					$this->typeName = "Gallery";
					break;
				case PAGETYPE_EXTERNAL:
					$this->typeName = "External Link";
					break;
				default:
					$this->typeName = "Error";
					break;
			}
		}
	}

?>