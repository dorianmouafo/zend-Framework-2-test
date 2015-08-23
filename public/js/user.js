/**
 * @author Dorian
 */

var app = angular.module('myapp', []);
//define simple attributes
app.run(function($rootScope) {
  $rootScope.name = "Register a New Account ";
});

app.controller('MyController', function($scope) {
  $scope.person = {
	    name: "Name:",
		username: "UserName:"
  };
});