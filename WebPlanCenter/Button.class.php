<?php

	class Button {
		private $title;
		private $iconDecorator;
		private $icon;
		
		function __construct($title, $actionName, $iconType) {
			$this->title = $title;
			$this->actionName = $actionName;
			$iconType = $iconType."Decorator";
			$this->iconDecorator = new $iconType($this);
		}
		
		function getTitle() {
			return $this->title;
		}
		
		function getIcon() {
			return $this->iconDecorator->getIcon();
		}
		
		}
		
		function output() {
			ob_start();
			?>
			<div class="action">
				<div class="action-icon">
					<i class="fa <?php echo $this->getIcon() ?> fa-fw"></i>
				</div>
				<div class="action-text">
					<?php echo $this->getTitle() ?>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}
	}
	
	class ButtonList {
		private $buttons = [];
		private $buttonCount = 0;
		
		function __construct() {}
		
		function getButtons() {
			return $this->buttons;
		}
		
		function addButton(Button $button) {
			$this->buttons[] = $button;
			$this->buttonCount++;
			return $this->buttonCount;
		}
		
		function getButtonCount() {
			return $this->buttonCount;
		}
		
	}
	
	class ButtonListIterator {
		protected $buttonList;
		protected $currentButton = 0;
		
		function __construct(ButtonList $buttonList) {
			$this->buttonList = $buttonList;
		}
		
		function getCurrentButton() {
			if (isset($this->buttonList->getButtons()[$this->currentButton])) {
				return $this->buttonList->getButtons()[$this->currentButton];
			}
			return null;
		}
		
		function getNextButton() {
			$this->currentButton++;
			return $this->getCurrentButton();
		}
		
		function hasNextButton() {
			
			return isset($this->buttonList->getButtons()[($this->currentButton)+1]);
		}
		
	}

?>