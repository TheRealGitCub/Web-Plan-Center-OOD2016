<?php

	define(PAGETYPE_LANDING, 0);
	define(PAGETYPE_GALLERY, 1);
	define(PAGETYPE_EXTERNAL, 2);

	# MVC Pattern Setup & Implementation
	require 'WebPlanCenter/PageModel.class.php';
	require 'WebPlanCenter/PageView.class.php';
	require 'WebPlanCenter/PageController.class.php';
	
	# Facade Pattern Setup & Implementation
	require 'WebPlanCenter/IndexFacade.class.php';
	$index = new IndexFacade();
	
	# Contains Iterator Pattern
	
	# Iterator Pattern Setup & Implementation + Decorator Implementation
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
		
		<div class="dialog-outer" id="dialog-add-item">
			<div class="dialog">
				<div class="dialog-inner">
					<h2>Add New <span class="dialog-page-type">Page</span></h2>
					<form id="form-add-item">
						<div class="form-group">
							<label for="add-item-name">Page Name</label>
							<input type="text" name="add-item-name" id="add-item-name">
						</div>
						
						<div class="form-group">
							<label for="add-item-page-type">Page Type</label>
							<select id="add-item-page-type" name="add-item-page-type">
								<option value="landing">Landing Page</option>
								<option value="gallery">Gallery Page</option>
								<option value="external">External Link</option>
							</select>
						</div>
						<div class="clearfix">
						<input type="submit" id="add-item-submit"></input>
					</div>
					</form>
				</div>
			</div>
		</div>
	
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
