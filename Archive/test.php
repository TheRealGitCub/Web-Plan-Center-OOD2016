<?php

	require 'WebPlanCenter/BasicModel.class.php';
	require 'WebPlanCenter/BasicView.class.php';
	require 'WebPlanCenter/BasicController.class.php';
	
	$model = new BasicModel();
	$controller = new BasicController($model);
	$view = new BasicView($controller, $model);
	
	if (isset($_GET["action"]) && !empty($_GET["action"])) {
		$controller->{$_GET["action"]}();
	}
	
	echo $view -> output();

?>