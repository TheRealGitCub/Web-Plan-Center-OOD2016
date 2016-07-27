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
			
			$buttonIterator->getCurrentButton()->output();
			while ($buttonIterator->hasNextButton()) {
				$buttonIterator->getNextButton()->output();
			}
		}
	}

?>