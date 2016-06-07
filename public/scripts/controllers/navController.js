// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('NavController', NavController);


    function NavController($location, $rootScope, $scope, $auth, search, cacheService) {
        $scope.user = JSON.parse(localStorage.getItem('user'));
        $scope.searchText = '';
        $scope.search = function(){
            search.searchByName($scope.searchText).then(function(result){
                $scope.data = result;
                cacheService.setCache("search_series", result);
                $rootScope.$emit("UpdateSearch", {
                    data: result
                });

                $location.path("/landing");
            });
        };
        
        $scope.logout = function(){
            $auth.logout().then(function () {

                // Remove the authenticated user from local storage
                localStorage.removeItem('user');

                cacheService.clear();

                // Flip authenticated to false so that we no longer
                // show UI elements dependant on the user being logged in
                $rootScope.authenticated = false;

                $location.path("/auth");
            });
        }
    }
})();