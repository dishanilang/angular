//http://stackoverflow.com/questions/26304495/creating-an-authservice-to-check-if-user-is-logged-in
//http://stackoverflow.com/questions/20969835/angularjs-login-and-authentication-in-each-route-and-controller

'use strict';

var clientApp = angular.module('myApp', ['ui.router']);

clientApp.config(routerConfig); // routing and confinguration

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
			$http.post('http://localhost/proposal_request/client/clientLogin/clientLogout');
			$location.path('/client/login');
		},

		isLogged: function () {
			var $check = $http.post('http://localhost/proposal_request/client/clientLogin/checkLoginSession');
			return $check;
		}
	}
});

/** @ngInject */
function routerConfig($stateProvider, $urlRouterProvider) {
	
	$stateProvider
		.state("client", {
			url: "/",
			templateUrl: "view/home.html",
			abstract: true,
		})
		.state("client.login", {
			url: "/client/login",
			templateUrl: "view/login.php",
			controller: "clientLogin"
		})
		.state("client.dashboard", {
			url: "/client/dashboard",
			templateUrl: "view/dashboard.php",
		})
		.state("client.logout", {
			url: "/client/logout",
		});

	$urlRouterProvider.otherwise("/client/login");
}