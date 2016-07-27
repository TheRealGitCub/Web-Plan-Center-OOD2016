<?php

	class Button {
		private $title;
		private $icon;
		
		function __construct($title, $icon) {
			$this->title = $title;
			$this->icon = $icon;
		}
		
		function output() {
			ob_start();
			?>
			<div class="action">
				<div class="action-icon">
					<i class="fa <?php echo $this->icon ?> fa-fw"></i>
				</div>
				<div class="action-text">
					<?php echo $this->title ?>
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
			return ++$this->buttonCount;
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
			if ($this->hasNextButton()) {
				return $this->buttonList->getButtons()[++$this->currentButton];
			}
			return null;
		}
		
		function hasNextButton() {
			return isset($this->buttonList->getButtons()[$this->currentButton+1]);
		}
		
	}

?>