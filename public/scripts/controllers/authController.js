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
    function AuthController($location, $scope, authenticateService,$window, modalService) {
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
            authenticateService.authenticate(credentials).then(function(data){
                if(angular.isUndefined(data)){
                    var message = "Invalid pseudo or password";
                    modalService.openDialogModal("Error", "Invalid pseudo or password");
                    console.error(message);
                }else {
                    $window.history.back();
                }
            });
        };
        
        $scope.home = function(){
            $location.path('/');
        }
    }
})();