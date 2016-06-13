(function () {
    'use strict';
    angular.module('serialWatcherApp').controller('AuthController', AuthController);

    /**
     * This Controller authenticates a user using his nickname is password. 
     * @param $auth : Use Satellizer.js for the authentication
     * @param $location
     * @param $scope
     * @param $window
     * @param $http
     * @param $rootScope
     * @constructor
     */
    function AuthController($auth, $location, $scope, $window, $http, $rootScope) {
        var vm = this;
        vm.loginError = false;
        vm.loginErrorText;

        /**
         * Authenticate the user, using the api path : api/authenticate/user to get a token.
         */
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

                // Stringify the returned data for the local storage
                var user = JSON.stringify(response.data.user);

                // Set the stringified user data into local storage
                localStorage.setItem('user', user);

                // Define the user as logged in
                $rootScope.authenticated = true;

                // Put the user's data on the rootScop
                // allows us to access it anywhere
                $rootScope.currentUser = response.data.user;

                // Redirect the users state to view data
                $window.history.back();
            });
        };
        
        $scope.home = function(){
            $location.path('/');
        }
    }
})();