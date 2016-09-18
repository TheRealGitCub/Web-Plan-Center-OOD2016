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
	
	# Decorator Pattern Setup
	require 'WebPlanCenter/ButtonDecorator.class.php';
	
	# Iterator Pattern Setup & Implementation + Decorator Implementation
	require 'WebPlanCenter/Button.class.php';
	
	session_start();
	
	$buttons = [
		new Button (
			"New Landing Page",
			"new-landing",
			"AddButton"
		),
		new Button (
			"New Gallery Page",
			"new-gallery",
			"AddButton"
		),
		new Button (
			"New External Link",
			"new-external",
			"AddButton"
		),
		new Button (
			"Clear All Pages",
			"clear-all",
			"DeleteButton"
		),
		new Button (
			"About This Program",
			"about",
			"AboutButton"
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
					<div class="dialog-header">Add <span class="dialog-page-type">--</span></div>
					<form id="form-add-item" class="dialog-content">
						<div class="form-group">
							<label for="add-item-name">Page Name</label>
							<input type="text" name="add-item-name" id="add-item-name">
						</div>
						
						<input type="hidden" id="add-item-page-type" name="add-item-page-type">
						
						<div class="form-group hidden" id="form-group-add-item-link">
							<label for="add-item-link">External Link URL</label>
							<input type="text" name="add-item-link" id="add-item-link">
						</div>
						
						<div class="text-right">
							<input type="button" class="dialog-cancel" value="Cancel"></input>
							<input type="submit" id="add-item-submit" value="Submit" class="btn-primary"></input>
						</div>
						
					</form>
				</div>
			</div>
		</div>
		
		<div class="dialog-outer" id="dialog-about">
			<div class="dialog">
				<div class="dialog-inner">
					<div class="dialog-header">About Web Plan Center</div>
					<div class="dialog-content">
						This application was developed by <a href="http://kobitate.com">Kobi Tate</a>.
						It was created for an Object Oriented design class, and it employs
						various object orientation design patterns such as:
						
						<ul>
							<li>Model / View / Controller (main UI)</li>
							<li>Decorator Pattern (action button icons)</li>
							<li>Facade Pattern (main UI actions)</li>
							<li>Iterator Pattern (button generation)</li>
						</ul>
						
						It was built from scratch, taking advantage of <a href="http://jquery.com">jQuery</a>,
						<a href="http://fontawesome.io">FontAwesome</a>, and <a href="http://lesscss.org">Less</a>.
						Dependencies are managed by <a href="https://bower.io">Bower</a>.
						Web hosting provided by <a href="http://digitalocean.com">DigitalOcean</a>.
						
						<div class="text-right">
							<form><input type="button" class="dialog-cancel" value="Close"></form>
						</div>
					</div>
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
		
		<div id="toast">
			<div id="toast-inner">
				Mmmm... toast
			</div>
		</div>
		
	</div>

</body>

</html>
