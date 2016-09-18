<?php

	class PageListIterator {
		protected $pageList;
		protected $currentPage = 0;
		
		public function __construct(PageList $pageList) {
			$this->pageList = $pageList;
		}
		
		public function getCurrentPage() {
			if (isset($this->pageList[$this->currentPage])) {
				return $this->pageList[$this->currentPage];
			}
			else {
				return null;
			}
		}
		
		public function getNextPage() {
			if ($this->hasNextPage()) {
				return $this->pageList[++$this->currentPage];
			}
			else {
				return null;
			}
		}
		
		public function hasNextPage() {
			return ($this->pageList->getPageCount() > $this->currentPage);
		}
	}

?>