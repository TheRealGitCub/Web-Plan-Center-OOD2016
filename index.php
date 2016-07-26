<?php

	require 'WebPlanCenter/PageModel.class.php';
	require 'WebPlanCenter/PageView.class.php';
	require 'WebPlanCenter/PageController.class.php';
	
	session_start();
	
	$_SESSION["pages"] = [
		[
			"title" => "Home",
			"type" => PAGETYPE_LANDING,
			"children" => [],
		],
		[
			"title" => "About Me",
			"type" => PAGETYPE_LANDING,
			"children" => ["A Child"],
		],
		[
			"title" => "Gallery",
			"type" => PAGETYPE_GALLERY,
			"children" => [],
		],
		[
			"title" => "Twitter",
			"type" => PAGETYPE_EXTERNAL,
			"children" => [],
		]
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
