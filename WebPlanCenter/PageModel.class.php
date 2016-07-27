<?php

	define(PAGETYPE_LANDING, 0);
	define(PAGETYPE_GALLERY, 1);
	define(PAGETYPE_EXTERNAL, 2);

	class PageModel {
		public $title;
		public $type;
		public $children;
		public $typeName;
		
		public function __construct($title, $type, $children = []) {
			$this->title = $title;
			$this->type = $type;
			$this->children = $children;
			
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