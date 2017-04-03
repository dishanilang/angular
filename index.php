<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="assets/jquery-2.1.1.min.js" type="text/javascript" ></script>
		<script src="assets/js/angular.min.js" type="text/javascript" ></script>
		<script src="assets/js/angular-route.min.js" type="text/javascript" ></script> 
		<?php /*<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js" type="text/javascript" ></script>*/ ?>

	</head>

	<body ng-app='myApp'>
	
		<h1> Project Proposal Request Portal </h1>
		<div class="span6">
			<div class="row" ng-view></div>
		</div>
		<a href='#client/login'>Login</a>
		<a href='#client/dashboard'>Dashboard</a>
		<script type="text/javascript" src="apphome.js"></script>
		<script type="text/javascript" src="controller/apphomeController.js"></script>
	</body>
</html>