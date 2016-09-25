<?php

	class PageView {
		private $controller;
		private $model;
		
		public function __construct($controller, $model) {
			$this->controller = $controller;
			$this->model = $model;
		}
		
		public function output() {
			$pageClass = "page";
			
			if (!empty($this->model->children)){
				$pageClass .= " page-stack";
			}
			
			if ($this->model->type == PAGETYPE_EXTERNAL) {
				$pageClass .= " page-external";
			}
			
			ob_start();
			?>
			    <div class="<?php echo $pageClass ?>" id="page-<?php echo $this->model->sessionIndex ?>">
					<strong><?php echo $this->model->title ?></strong>
					<?php echo $this->model->typeName ?>
				</div>
			<?php
			return ob_get_clean();
		}
	}

?>