<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Angular Page</title>
	</head>
	
	<body>
		<div>
			<p>Angular Js HTML page called with data passing.</p>
		</div>
		
		<table class="table table-striped table-condensed table-bordered" border='1'>
			<tr>
				<th>Name</th>
				<th>Age</th>
				<th>City</th>
				<th>State</th>
			</tr>
			
			<tr ng-repeat="user in users">
				<td>{{user.name}}</td>
				<td>{{user.age}}</td>
				<td>{{user.city}}</td>
				<td>{{user.country}}</td>
			</tr>
		</table>
	</body>
<html>