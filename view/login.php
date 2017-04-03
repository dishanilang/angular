<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Angular Page</title>
	</head>
	
	<body>
		<div>
			<p>Client Login.</p>
		</div>
		
		<div>
			<div class="flashmsg" ng-show='errorMsgShow' ng-bind-html='errorMsg | trust' id="errormsg"></div>
			
			<form  name="frmClient" id="frmClient" enctype="multipart/form-data" method="POST" ng-submit="submitClientLoginForm(frmClient.$valid)" novalidate>
			
				<div>
					<input type="text" name="txtEmail" id="txtEmail" ng-model="txtEmail" placeholder="Enter Email" autocomplete="off" ng-class="{ 'has-error' : frmClient.txtEmail.$invalid && (!frmClient.txtEmail.$pristine || frmClient.txtEmail.$touched || frmClient.$submitted)}" required>
					<span ng-show="frmClient.txtEmail.$invalid && (!frmClient.txtEmail.$pristine || frmClient.txtEmail.$touched || frmClient.$submitted)" class="help-block">Email is required.</span>
				</div>
				
				<div> <p> </p> </div>
				
				<div>
					<input autocomplete="off" type="password" name="txtPassword" id="txtPassword" ng-model="txtPassword" placeholder="Enter Password" ng-class="{ 'has-error' : frmClient.txtPassword.$invalid && (!frmClient.txtPassword.$pristine || frmClient.txtPassword.$touched || frmClient.$submitted) }" required>
					<span ng-show="frmClient.txtPassword.$invalid && (!frmClient.txtPassword.$pristine || frmClient.txtPassword.$touched || frmClient.$submitted)" class="help-block">Password is required.</span>
				</div>
				
				<div>
					<button type="submit" name="btnLogin" class="button button-block"> Log In </button>
				</div>
			</form>
		</div>
		
		
	</body>
<html>