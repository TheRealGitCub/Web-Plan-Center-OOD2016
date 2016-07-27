<?php

	class PageList {
		private $pages = [];
		private $pageCount = 0;
		
		public function __construct() {}
			
		public function getPageCount() {
			return $this->pageCount;
		}
		
		public function getNthPage($n) {
			if (is_numeric($n) && isset($this -> pages[$n]) ) {
				return $this -> pages[$n];
			}
			
			return null;
		}
		
		public function addPage(PageModel $add_page) {
			$this->pageCount++;
			$this->pages[] = $add_page;
			return $this->pageCount;
		}
		
		public function removePage(PageModel $rm_page) {
			foreach ($this->pages as $n => $page) {
				if ($page == $rm_page) {
					array_splice($this->pages, $n);
				}
				return $this->pageCount;
			}
		}
		
	}

?>