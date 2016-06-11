// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('ResearchController', ResearchController);


    function ResearchController($scope, $rootScope, $location, cacheService) {

        $scope.data = cacheService.getData("search_series");
        $rootScope.$on("UpdateSearch", function(event, data){
            $scope.data = data.data;
        });

        $scope.detail = function(serie){
            cacheService.setCache("selected_serie", serie);
            $location.path("/single");
        }
      
    }
})();