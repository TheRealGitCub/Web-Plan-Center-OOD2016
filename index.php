<?php

	# MVC Pattern
	require 'WebPlanCenter/PageModel.class.php';
	require 'WebPlanCenter/PageView.class.php';
	require 'WebPlanCenter/PageController.class.php';
	
	# Iterator Pattern
	# NOT IN USE
	//require 'WebPlanCenter/PageList.class.php';
	//require 'WebPlanCenter/PageListIterator.class.php';
	
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
			<div class="action">
				<div class="action-icon">
					<i class="fa fa-file fa-fw"></i>
				</div>
				<div class="action-text">
					New Landing Page
				</div>
			</div>
			<div class="action">
				<div class="action-icon">
					<i class="fa fa-photo fa-fw"></i>
				</div>
				<div class="action-text">
					New Gallery Page
				</div>
			</div>
			<div class="action">
				<div class="action-icon">
					<i class="fa fa-external-link fa-fw"></i>
				</div>
				<div class="action-text">
					New External Link
				</div>
			</div>
			<div class="action action-right">
				<div class="action-icon">
					<i class="fa fa-save fa-fw"></i>
				</div>
				<div class="action-text">
					Export Site Layout
				</div>
			</div>
		</div>
		
		<div id="content">
			<?php
			
				foreach($_SESSION["pages"] as $page) {
					$model = new PageModel($page["title"], $page["type"], $page["children"]);
					$controller = new PageController($model);
					$view = new PageView($controller, $model);
					
					echo $view -> output();
					
				}
			
			?>
		</div>
		
	</div>

</body>

</html>
