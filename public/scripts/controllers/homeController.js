// public/scripts/authController.js

(function () {
    'use strict';
    angular.module('serialWatcherApp').controller('HomeController', HomeController);

    /**
     * Display a list of series for the main view
     * @param $scope
     * @param $location
     * @param homeService
     * @param cacheService
     * @constructor
     */
    function HomeController($scope, $location, homeService, cacheService) {
        var isLogged = localStorage.getItem("user") != null;

        // Load all featured series
        homeService.getFeaturedSeries().then(function (response) {
            $scope.featuredSeries = response.featuredseries;
        });

        // load all favourite series if the user are authenticated.
        if (isLogged) {
            homeService.getFavouriteSeries().then(function (response) {
                $scope.favouritesSeries = response.favouritesSeries;
            });
        }

        $scope.detail = function (serie) {
            cacheService.setCache("selected_serie", serie);
            $location.path("/single");
        };

    }
})();