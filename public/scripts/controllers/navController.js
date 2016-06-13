// public/scripts/authController.js

(function () {

    'use strict';

    angular.module('serialWatcherApp').controller('NavController', NavController);


    /**
     * Controller for the navigation menu.
     * It allows you to search series, authenticate the user or hide some item on the nav bar.
     * @param $location
     * @param $rootScope
     * @param $scope
     * @param $auth
     * @param search
     * @param cacheService
     * @constructor
     */
    function NavController($location, $rootScope, $scope, $auth, search, cacheService) {
        $scope.user = JSON.parse(localStorage.getItem('user'));
        $scope.searchText = '';
        console.log($scope.user);

        // Search series by name
        $scope.search = function(){
            search.searchByName($scope.searchText).then(function(result){
                $scope.data = result;

                // Save the searched series. this will be used by the ResearchController
                cacheService.setCache("search_series", result);

                // Dispatches an event for every controllers.
                // This will be used by the LandingController to update the $scope.
                $rootScope.$emit("UpdateSearch", {
                    data: result
                });

                $location.path("/landing");
            });
        };

        // Logout the authenticated user
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