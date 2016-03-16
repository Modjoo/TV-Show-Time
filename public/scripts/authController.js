// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('AuthController', AuthController);


    function AuthController($auth, $state, $http, $rootScope) {

        var vm = this;

        vm.loginError = false;
        vm.loginErrorText;

        vm.login = function () {

            var credentials = {
                pseudo: vm.pseudo,
                password: vm.password
            };

            // Use Satellizer's $auth service to login
            $auth.login(credentials).then(function () {

                //Return an $http request for the now authenticated user
                return $http.get('api/authenticate/user');

            }, function (error) {
                vm.loginError = true;
                vm.loginErrorText = error.data.error;

            }).then(function (response) {

                console.log(response);

                // Stringify the returned data for the local storage
                var user = JSON.stringify(response.data.user);

                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // Define the user logged in
                $rootScope.authenticated = true;

                // Putting the user's data on the rootScop
                // allows us to access it anywhere
                $rootScope.currentUser = response.data.user;

                // Redirect the users state to view data
                $state.go('users');
            });
        };
    }
})();