<?php

	class IndexFacade {
		public function printPages($pages) {
			foreach($pages as $pageModel) {
				$controller = new PageController($pageModel);
				$view = new PageView($controller, $pageModel);
				
				echo $view->output();
				
			}
		}
	}

?>