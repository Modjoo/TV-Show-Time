// public/scripts/authController.js

(function () {

    'use strict';

    angular.module('serialWatcherApp').controller('LandingController', LandingController);


    /**
     * This Controller only displays a list of series sought by the user.
     * It does not do the research itself.
     * @param $scope
     * @param $rootScope
     * @param $location
     * @param cacheService
     * @constructor
     */
    function LandingController($scope, $rootScope, $location, cacheService) {

        // Get searched series from the local storage.
        $scope.data = cacheService.getData("search_series");

        // Updates the list of series if an event came
        $rootScope.$on("UpdateSearch", function(event, data){
            $scope.data = data.data;
        });

        // If one serie as been choosen by the user.
        $scope.detail = function(serie){
            cacheService.setCache("selected_serie", serie);
            $location.path("/single");
        }
    }
})();