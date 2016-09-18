<?php

	class IndexFacade {
		public function printPages($pages) {
			foreach($pages as $pageModel) {
				$controller = new PageController($pageModel);
				$view = new PageView($controller, $pageModel);
				
				echo $view->output();
				
			}
		}
		
		public function printButtons($buttons) {
			$buttonList = new ButtonList();
			
			foreach ($buttons as $button) {
				$buttonList->addButton($button);
			}
			
			$buttonIterator = new ButtonListIterator($buttonList);
			
			echo $buttonIterator->getCurrentButton()->output();
			
			while ($buttonIterator->hasNextButton()) {
				$next = $buttonIterator->getNextButton();
				echo $next->output();
			}
		}
		
		public function newPage($pageName, $pageTypeString, $children = null) {
			$type = constant("PAGETYPE_" . strtoupper($pageTypeString));
			$pageModel = new PageModel (
				$pageName,
				$type,
				$children
			);
			
			$controller = new PageController($pageModel);
			$controller->newPage($pageModel);
		}
		
		public function clearPages() {
			session_destroy();
		}
	}

?>