// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('ResearchController', ResearchController);


    function ResearchController($scope, $rootScope, $location, cacheService) {
        $rootScope.$on("UpdateSearch", function(event, data){
            $scope.data = data.data;
        });

        $scope.detail = function(serie){
            cacheService.addToCache("selected_serie", serie);
            $location.path("/single");
        }
      
    }
})();