//http://stackoverflow.com/questions/26304495/creating-an-authservice-to-check-if-user-is-logged-in
//http://stackoverflow.com/questions/20969835/angularjs-login-and-authentication-in-each-route-and-controller

'use strict';

var clientApp = angular.module('myApp', ['ngRoute']);


/* // constant define
clientApp.constant("SERVER_REQUEST_URL_BASE_PATH_CLIENT", 'http://localhost/proposal_request/client/')
clientApp.constant("TOTAL_NO_FILE_UPLOAD", 5);
clientApp.constant("ALLOW_FILE_TYPE", ['pdf', 'doc', 'docx', 'xls', 'xlsx']);
clientApp.constant("MAX_UPLOAD_FILE_SIZE", 8.00);
*/

var SERVER_REQUEST_URL_BASE_PATH_CLIENT = 'http://localhost/proposal_request/client/';

var TOTAL_NO_FILE_UPLOAD = 5;

var ALLOW_FILE_TYPE = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];

var MAX_UPLOAD_FILE_SIZE = 8.00;


clientApp.factory('loginService', function ($http, $location) {

	return {
		/*login: function (data, scope) {
			var $promise = $http.post('api.php/site/login', data);
			$promise.then(function (msg) {
				var uId = msg.data.key;
				if (msg.data.key) {
					$location.path('/abAdmin/home');
				} else {
					$location.path('/abAdmin');
				}
			});
		}, */

		logout: function () {
			$http.post(SERVER_REQUEST_URL_BASE_PATH_CLIENT +'clientLogin/clientLogout');
			$location.path('/client/login');
		},

		isLogged: function () {
			var $check = $http.post(SERVER_REQUEST_URL_BASE_PATH_CLIENT +'clientLogin/checkLoginSession');
			return $check;
		}
	}
});
  
clientApp.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
	
	$routeProvider
		.when('/client', {
			templateUrl: 'view/home.html',
		})
		.when('/client/login', {
			templateUrl: 'view/login.php',
			controller: 'clientLogin',
		})
		.when('/client/dashboard', {
			templateUrl: 'view/dashboard.php',
			//controller: 'clientLogin',
		})
		.when('/client/request-proposal/add', {
			templateUrl: 'view/addRequestProposal.php',
			controller: 'clientRequestProposal',
		})
		.when('/client/logout', {
			templateUrl: 'view/dashboard.php',
			//controller: 'clientLogin',
		})
		.otherwise({redirectTo:'/logintest'})		

}]);

clientApp.run(function ($rootScope, $location, loginService) {
	
	$rootScope.$on('$routeChangeStart', function (e, current) {
		if(current.$$route.originalPath === '/client/login' ){
			
		}
		else if(current.$$route.originalPath === '/client/logout' ){
			loginService.logout();
		}else{
			
			var connected = loginService.isLogged();

			connected.then(function (data) {
				//console.log(data.data); 
				if (!data.data.isLogged) {
					//logged=true;
					//e.preventDefault();
					$location.path('/client/login');
				}
			})
		}
  });
});

/*clientApp.run(function ($logincheck, $location) {

    console.log("Into run mode");
    
	//console.log("Userid 5 is logged in: ", $logincheck(5));
    //console.log("Userid 0  logged in: ", $logincheck(0));
	//alert('dd');
    //now redirect to appropriate path based on login status
    if ($logincheck(1)) {
      $location.path('/client/dashboard');
    }
    else {
      $location.path('/client/login');
    }
});
*/

/*clientApp.run(function ($rootScope, $state, AuthService) {
	
    $rootScope.$on("$stateChangeStart", function(event, toState, toParams, fromState, fromParams){

		console.log(toState.authenticate); return false;

      if (toState.authenticate && !AuthService.isAuthenticated()){
        // User isn’t authenticated
        $state.transitionTo("login");
        event.preventDefault(); 
      }
    });
});*/