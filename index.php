<?php

	# MVC Pattern
	require 'WebPlanCenter/PageModel.class.php';
	require 'WebPlanCenter/PageView.class.php';
	require 'WebPlanCenter/PageController.class.php';
	
	# Iterator Pattern
	# NOT IN USE BECAUSE IT SUCKS
	//require 'WebPlanCenter/PageList.class.php';
	//require 'WebPlanCenter/PageListIterator.class.php';
	
	# Facade Pattern
	require 'WebPlanCenter/IndexFacade.class.php';
	$index = new IndexFacade();
	
	# Contains Iterator Pattern
	require 'WebPlanCenter/Button.class.php';
	
	session_start();
	
	$_SESSION["pages"] = [
		new PageModel (
			"Home",
			PAGETYPE_LANDING
		),
		new PageModel (
			"About Me",
			PAGETYPE_LANDING,
			["A Child"]
		),
		new PageModel (
			"Current Projects",
			PAGETYPE_GALLERY
		),
		new PageModel (
			"Twitter",
			PAGETYPE_EXTERNAL
		)
	];
	
	$buttons = [
		new Button (
			"New Landing Page",
			"fa-file"
		),
		new Button (
			"New Gallery Page",
			"fa-photo"
		),
		new Button (
			"New External Link",
			"fa-external-link"
		),
		new Button (
			"About This Program",
			"fa-info-sign"
		)
	];
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Web Plan Center</title>
	<?php include 'assets/includes/assets.php'; ?>

</head>

<body>
	
	<div id="main-container">
	
		<div id="title-bar">
			Web Plan Center
		</div>
		
		<div id="action-bar">
			<?php $index->printButtons($buttons) ?>
		</div>
		
		<div id="content">
			<?php $index->printPages($_SESSION["pages"]) ?>
		</div>
		
	</div>

</body>

</html>
