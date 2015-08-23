/**
 * @author Dorian
 */

var app = angular.module('myapp', []);
//define simple attributes
app.run(function($rootScope) {
  $rootScope.name = "Register a New Account ";
});

app.controller('RegisterUser', function($scope) {
		  $scope.person = {
		  	    title: "Create a New Account",
			    name: "Name:",
				username: "Surname:",
				identifiant_number:"Identifiant Number:",
				identifiant_type:"Identifiant Type:",
				phone_number:"Phone Number:",
				email:"Email address:",
				user_name:"User Name:",
				user_password:"Password:"
				
		  };
		  
		  $scope.data = {
			    singleSelect: null,
			    availableOptions: [
			      {id: '1', name: 'Identity Card'},
			      {id: '2', name: 'Passport'},
			      {id: '3', name: 'Student Card'},
			      {id: '4', name: 'Register Number'}
			    ],
		  };
});