<?php

	class ButtonDecorator {
		protected $button;
		protected $icon;
		function  __construct(Button $button) {
			$this->button = $button;
		}
		
		function getIcon() {
			return $this->icon;
		}
	}
	
	class AddButtonDecorator extends ButtonDecorator {
		function __construct(Button $button) {
			parent::__construct($button);
			$this->addIcon();
		}
		function addIcon() {
			$this->icon = "fa-plus";
		}
	}
	
	class PhotoButtonDecorator extends ButtonDecorator {
		function __construct(Button $button) {
			parent::__construct($button);
			$this->addIcon();
		}
		function addIcon() {
			$this->icon = "fa-photo";
		}
	}
	
	class ExternalLinkButtonDecorator extends ButtonDecorator {
		function __construct(Button $button) {
			parent::__construct($button);
			$this->addIcon();
		}
		function addIcon() {
			$this->icon = "fa-external-link";
		}
	}
	
	class AboutButtonDecorator extends ButtonDecorator {
		function __construct(Button $button) {
			parent::__construct($button);
			$this->addIcon();
		}
		function addIcon() {
			$this->icon = "fa-info-circle";
		}
	}
	
	class DeleteButtonDecorator extends ButtonDecorator {
		function __construct(Button $button) {
			parent::__construct($button);
			$this->addIcon();
		}
		function addIcon() {
			$this->icon = "fa-trash";
		}
	}

?>