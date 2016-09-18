<?php

	define(PAGETYPE_LANDING, 0);
	define(PAGETYPE_GALLERY, 1);
	define(PAGETYPE_EXTERNAL, 2);

	# MVC Pattern Setup & Implementation
	require '../../WebPlanCenter/PageModel.class.php';
	require '../../WebPlanCenter/PageView.class.php';
	require '../../WebPlanCenter/PageController.class.php';
	
	# Facade Pattern Setup & Implementation
	require '../../WebPlanCenter/IndexFacade.class.php';
	$index = new IndexFacade();
	
	# Decorator Pattern Setup
	require '../../WebPlanCenter/ButtonDecorator.class.php';
	
	# Iterator Pattern Setup & Implementation + Decorator Implementation
	require '../../WebPlanCenter/Button.class.php';
	
	session_start();
	
	$index->printPages($_SESSION["pages"]);
	
	
?>